<?php

namespace MoySklad\Entity\Document;

use DateTime;
use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\Meta;
use MoySklad\Entity\MetaArray;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class ProcessingProcess extends MetaEntity
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
    public $description;

    /**
     * @Type("string")
     */
    public $externalCode;

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
     * @Type("MoySklad\Entity\MetaArray")
     * @Generator(type="object", anyFromExists=true)
     */
    public $positions;

    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("DateTime<'Y-m-d\TH:i:s.v\Z'>")
     */
    public $updated;
}
