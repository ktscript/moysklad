<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class ProductionTask extends MetaEntity
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
     * @Type("array<Object>")
     */
    public $attributes = [];

    /**
     * @Type("bool")
     */
    public $awaiting;

    /**
     * @Type("string")
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
     */
    public $description;

    /**
     * @Type("string")
     */
    public $externalCode;

    /**
     * @Type("array<MoySklad\Entity\Meta>")
     */
    public $files = [];

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $group;

    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $materialsStore;

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
     */
    public $name;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $organization;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $owner;

    /**
     * @Type("bool")
     */
    public $printed;

    /**
     * @Type("array<MoySklad\Entity\Meta>")
     */
    public $productionRows = [];

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $productionEnd;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $productionStart;

    /**
     * @Type("array<MoySklad\Entity\Meta>")
     */
    public $products = [];

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $productsStore;

    /**
     * @Type("bool")
     */
    public $published;

    /**
     * @Type("bool")
     */
    public $reserve;

    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $state;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;
}
