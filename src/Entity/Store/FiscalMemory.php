<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

class FiscalMemory
{
    /**
     * @Type("int")
     */
    public $notSendDocCount;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $notSendFirstDocMoment;

    /**
     * @Type("MoySklad\Entity\Store\Error")
     */
    public $error;
}
