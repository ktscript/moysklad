<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

class Note extends MetaEntity
{
    /**
     * @Type("DateTime<'Y-m-d H:i:s.v.v'>")
     */
    public $created;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("MoySklad\Entity\Agent\Counterparty")
     */
    public $agent;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $author;
}
