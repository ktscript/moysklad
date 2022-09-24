<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\Groups;

class Store extends AbstractStore
{
    /**
     * @Type("string")
     * @Generator()
     */
    public $code;

    /**
     * @Type("string")
     */
    public $pathName;

    /**
     * @Type("MoySklad\Entity\Store\Store")
     */
    public $parent;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     */
    public $attributes = [];
}
