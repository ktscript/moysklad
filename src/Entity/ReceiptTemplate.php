<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

class ReceiptTemplate extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $header;

    /**
     * @Type("string")
     */
    public $footer;
}
