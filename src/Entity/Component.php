<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\Groups;

class Component extends MetaEntity
{
    /**
     * @Type("int")
     * @Generator()
     */
    public $quantity;

    /**
     * @Type("MoySklad\Entity\Product\Product")
     * @Generator(type="object")
     */
    public $assortment;
}
