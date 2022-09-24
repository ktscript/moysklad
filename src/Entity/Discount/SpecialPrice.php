<?php

namespace MoySklad\Entity\Discount;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

class SpecialPrice
{
    /**
     * @Type("int")
     */
    public $value;

    /**
     * @Type("MoySklad\Entity\PriceType")
     */
    public $priceType;
}
