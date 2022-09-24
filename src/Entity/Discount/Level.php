<?php

namespace MoySklad\Entity\Discount;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

class Level
{
    /**
     * @Type("int")
     */
    public $amount;

    /**
     * @Type("int")
     */
    public $discount;
}
