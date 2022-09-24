<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

class PaymentTerminal
{
    /**
     * @Type("string")
     */
    public $acquiringType;
}
