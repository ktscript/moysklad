<?php

namespace MoySklad\Entity\Metadata;
use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
         
abstract class Metadata extends MetaEntity
{
    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $meta;
}
