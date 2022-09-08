<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Group extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $name;
}
