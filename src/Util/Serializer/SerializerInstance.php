<?php

namespace MoySklad\Util\Serializer;

use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Expression\ExpressionEvaluator;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use MoySklad\Entity\MetaEntity;
use MoySklad\Entity\Barcode;

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

    private function __construct(){}

    protected static function getExpressionLanguage()
    {
        $language = new ExpressionLanguage();

        $language->register('empty', function($value){ 
            return $value; 
        }, function ($arguments, $object) {
            return !isset($object->{$arguments['property_metadata']->serializedName}) ||
                empty($object->{$arguments['property_metadata']->serializedName});
        });

        $language->register('count', function($value){ 
            return $value; 
        }, function ($arguments, $object) {
            return isset($object->{$arguments['property_metadata']->serializedName})
		&& count($object->{$arguments['property_metadata']->serializedName}); 
        });


        return $language;
    }

    public static function getInstance(): Serializer
    {
        if (is_null(self::$instance)) {	   

            self::$instance = SerializerBuilder::create()
                /*->setSerializationContextFactory(function () {
                    return SerializationContext::create()
                            ->setSerializeNull(true);
                })*/
		->setExpressionEvaluator(new ExpressionEvaluator(self::getExpressionLanguage()))
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
                    }
                )
                ->addDefaultHandlers()
                ->build();

        }

        return self::$instance;
    }
}
