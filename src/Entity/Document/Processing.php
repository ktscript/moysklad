<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class Processing extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $accountId;

    /**
     * @Type("bool")
     * @Generator()
     */
    public $applicable;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
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
     * @Type("array<MoySklad\Entity\Document\ProcessingMaterial>")
     * @Generator(type="objectArray")
     */
    public $materials = [];

    /**
     * @Type("MoySklad\Entity\Store\Store")
     * @Generator(type="object", anyFromExists=true)
     */
    public $materialsStore;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     * @Generator(type="datetime")
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
     * @Type("MoySklad\Entity\Account")
     * @Generator(type="object", anyFromExists=true)
     */
    public $organizationAccount;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;

    /**
     * @Type("bool")
     */
    public $printed;

    /**
     * @Type("bool")
     */
    public $published;

    /**
     * @Type("int")
     * @Generator()
     */
    public $processingSum;

    /**
     * @Type("array<MoySklad\Entity\Product\Product>")
     * @Generator(type="objectArray")
     */
    public $products = [];

    /**
     * @Type("MoySklad\Entity\Store\Store")
     * @Generator(type="object", anyFromExists=true)
     */
    public $productsStore;

    /**
     * @Type("MoySklad\Entity\Project")
     * @Generator(type="object", anyFromExists=true)
     */
    public $project;

    /**
     * @Type("float")
     * @Generator()
     */
    public $quantity;

    /**
     * @Type("MoySklad\Entity\State")
     * @Generator(type="object", anyFromExists=true)
     */
    public $state;

    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("string")
     */
    public $syncId;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;
}
