<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Groups;

class Sync
{
    /**
     * @Type("string")
     */
    public $message;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $lastAttempMoment;
}
