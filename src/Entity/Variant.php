<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\Groups;

class Variant extends MetaEntity
{
    use StockTrait;

    /**
     * @Type("string")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $name;

    /**
     * @Type("string")
     * @Generator()
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $code;

    /**
     * @Type("string")
     * @Generator()
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $externalCode;

    /**
     * @Type("bool")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $archived;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $updated;

    /**
     * @Type("array<string>")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $things = [];

    /**
     * @Type("MoySklad\Entity\Product\Product")
     * @Generator(type="object")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $product;

    /**
     * @Type("MoySklad\Entity\Price")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $minPrice;

    /**
     * @Type("MoySklad\Entity\Price")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $buyPrice;

    /**
     * @Type("MoySklad\Entity\ListEntity")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $images;

    /**
     * @Type("array<MoySklad\Entity\Price>")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $salePrices = [];

    /**
     * @Type("array<MoySklad\Entity\Barcode>")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $barcodes = [];

    /**
     * @Type("array<MoySklad\Entity\Characteristic>")
     * @Generator(type="objectArray")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $characteristics = [];
}
