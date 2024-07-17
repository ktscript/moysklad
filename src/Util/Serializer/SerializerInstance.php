<?php

namespace MoySklad\Util\Serializer;

use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use MoySklad\Util\Serializer\UniversalObjectSerializer;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use MoySklad\Entity\MetaEntity;
use MoySklad\Entity\Barcode;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;


class SerializerInstance
{
    public const JSON_FORMAT = 'json';

    private const DIRECTION = [
        'serialization' => 1,
        'deserialization' => 2,
    ];

    /**
     * @var Serializer
     */
    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): Serializer
    {
        if (is_null(self::$instance)) {
            self::$instance = SerializerBuilder::create()
                ->setPropertyNamingStrategy(
                    new SerializedNameAnnotationStrategy(
                        new IdenticalPropertyNamingStrategy()
                    )
                )
                ->configureHandlers(
                    function (HandlerRegistry $registry) {
                        $registry->registerHandler(
                            self::DIRECTION['deserialization'],
                            MetaEntity::class,
                            'json',
                            new MetaEntityDeserializeHandler()
                        );
                        $registry->registerHandler(
                            self::DIRECTION['deserialization'],
                            Barcode::class,
                            'json',
                            new BarcodeDeserializeHandler()
                        );

                        self::registerAllEntities($registry);
                    }
                )
                ->addDefaultHandlers()
                ->build();
        }

        return self::$instance;
    }

    private static function registerAllEntities(HandlerRegistry $registry)
    {
        $directory = new RecursiveDirectoryIterator(__DIR__ . '/../../Entity');
        $iterator = new RecursiveIteratorIterator($directory);

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $class = self::getClassFromFile($file->getPathname());
                if ($class && is_subclass_of($class, MetaEntity::class)) {
                    $registry->registerHandler(
                        self::DIRECTION['serialization'],
                        $class,
                        'json',
                        [new UniversalObjectSerializer(), 'serializeToJson']
                    );
                }
            }
        }
    }

    private static function getClassFromFile($filepath)
    {
        $content = file_get_contents($filepath);
        if (preg_match('/namespace\s+([^\s;]+)\s*;/m', $content, $matches)) {
            $namespace = $matches[1];
            if (preg_match('/class\s+([^\s]+)\s/m', $content, $matches)) {
                $classname = $matches[1];
                return $namespace . '\\' . $classname;
            }
        }
        return null;
    }
}
