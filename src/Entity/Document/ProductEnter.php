<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Groups;
use MoySklad\Util\Object\Annotation\Generator;

use MoySklad\Entity\ListEntity;

/**
 * Оприходование товара
 */
class ProductEnter extends MetaEntity
{
    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     * @Generator(type="object")
     */
    public $owner;

    /**
     * @Type("bool")
     */
    public $shared = false;

    /**
     * @Type("MoySklad\Entity\Group")
     * @Generator(type="object")
     */
    public $group;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;

    /**
     * @Type("string")
     * Exclude(if="empty(object)")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $externalCode;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $moment;

    /**
     * @Type("bool")
     */
    public $applicable = true;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $created;

    /**
     * @Type("bool")
     */
    public $printed = false;

    /**
     * @Type("bool")
     */
    public $published = false;

    /**
     * @Type("MoySklad\Entity\Rate")
     * @Generator(type="object")
     */
    public $rate;

    /**
     * @Type("int")
     * Groups({"get"})
     */
    public $sum;

    /**
     * @Type("MoySklad\Entity\Agent\Organization")
     * @Generator(type="object")
     */
    public $organization;

    /**
     * @Type("MoySklad\Entity\Store\Store")
     * @Generator(type="object")
     */
    public $store;

    /**
     * @Type("array<MoySklad\Entity\Document\ProductEnterPosition>")
     * @Generator(type="objectArray", objectQuantity=3)
     */
    public $positions;
}
