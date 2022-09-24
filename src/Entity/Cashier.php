<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\Groups;

class Cashier extends MetaEntity
{
    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     * @Generator(type="object")
     */
    public $employee;

    /**
     * @Type("MoySklad\Entity\Store\RetailStore")
     */
    public $retailStore;
}
