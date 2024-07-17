<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class ProcessingPlanFolder extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $accountId;

    /**
     * @Type("bool")
     */
    public $archived;

    /**
     * @Type("string")
     */
    public $externalCode;

    /**
     * @Type("string")
     */
    public $code;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object", anyFromExists=true)
     */
    public $group;

    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object", anyFromExists=true)
     */
    public $meta;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object", anyFromExists=true)
     */
    public $owner;

    /**
     * @Type("string")
     */
    public $pathName;

    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("DateTime<'Y-m-d\TH:i:s.vO'>")
     */
    public $updated;
}
