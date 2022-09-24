<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

class State extends MetaEntity
{
    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $lastCheckMoment;

    /**
     * @Type("MoySklad\Entity\Store\Sync")
     */
    public $sync;

    /**
     * @Type("MoySklad\Entity\Store\FiscalMemory")
     */
    public $fiscalMemory;

    /**
     * @Type("MoySklad\Entity\Store\PaymentTerminal")
     */
    public $paymentTerminal;
}
