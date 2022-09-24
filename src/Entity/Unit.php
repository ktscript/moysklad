<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\Groups;

class Unit
{
    /**
     * @Type("string")
     * @Generator()
     */
    public $gender;

    /**
     * @Type("string")
     * @Generator()
     */
    public $s1;

    /**
     * @Type("string")
     * @Generator()
     */
    public $s2;

    /**
     * @Type("string")
     * @Generator()
     */
    public $s5;
}
