<?php

namespace MoySklad\Util\Serializer;

use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;

class UniversalObjectSerializer implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'object',
                'method' => 'serializeToJson'
            ]
        ];
    }

    public function serializeToJson(JsonSerializationVisitor $visitor, $object, array $type, SerializationContext $context)
    {
        $data = get_object_vars($object);

        foreach ($data as $key => $value) {
            if (is_array($value) && empty($value)) {
                unset($data[$key]);
            }
        }

        return $visitor->visitArray($data, $type);
    }
}
