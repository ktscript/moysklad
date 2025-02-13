<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class ProcessingOrder extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $accountId;

    /**
     * @Type("bool")
     */
    public $applicable;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     * @Generator(type="objectArray")
     */
    public $attributes = [];

    /**
     * @Type("string")
     * @Generator()
     */
    public $code;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $created;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $deleted;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $deliveryPlannedMoment;

    /**
     * @Type("string")
     * @Generator()
     */
    public $description;

    /**
     * @Type("string")
     * @Generator()
     */
    public $externalCode;

    /**
     * @Type("array<MoySklad\Entity\File>")
     * @Generator(type="objectArray")
     */
    public $files = [];

    /**
     * @Type("MoySklad\Entity\Group")
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
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $moment;

    /**
     * @Type("string")
     * @Generator()
     */
    public $name;

    /**
     * @Type("MoySklad\Entity\Agent\Organization")
     * @Generator(type="object", anyFromExists=true)
     */
    public $organization;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;

    /**
     * @Type("array<MoySklad\Entity\Document\ProcessingOrderPosition>")
     * @Generator(type="objectArray")
     */
    public $positions = [];

    /**
     * @Type("bool")
     */
    public $printed;

    /**
     * @Type("MoySklad\Entity\Document\ProcessingPlan")
     * @Generator(type="object", anyFromExists=true)
     */
    public $processingPlan;

    /**
     * @Type("MoySklad\Entity\Project")
     * @Generator(type="object", anyFromExists=true)
     */
    public $project;

    /**
     * @Type("bool")
     */
    public $published;

    /**
     * @Type("double")
     */
    public $quantity;

    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("MoySklad\Entity\State")
     * @Generator(type="object", anyFromExists=true)
     */
    public $state;

    /**
     * @Type("MoySklad\Entity\Store\Store")
     * @Generator(type="object", anyFromExists=true)
     */
    public $store;

    /**
     * @Type("string")
     */
    public $syncId;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;

}
