<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\Groups;

class Currency extends MetaEntity
{
    /**
     * @Type("string")
     * @Generator()
     */
    public $name;

    /**
     * @Type("string")
     * @Generator()
     */
    public $fullName;

    /**
     * @Type("string")
     * @Generator()
     */
    public $code;

    /**
     * @Type("string")
     * @Generator()
     */
    public $isoCode;

    /**
     * @Type("string")
     */
    public $rateUpdateType;

    /**
     * @Type("float")
     * @Generator()
     */
    public $rate;

    /**
     * @Type("int")
     */
    public $multiplicity;

    /**
     * @Type("bool")
     * @Generator()
     */
    public $indirect;

    /**
     * @Type("bool")
     */
    public $archived;

    /**
     * @Type("bool")
     */
    public $system;

    /**
     * @Type("bool")
     */
    public $default;

    /**
     * @Type("MoySklad\Entity\Unit")
     */
    public $majorUnit;

    /**
     * @Type("MoySklad\Entity\Unit")
     */
    public $minorUnit;
}
