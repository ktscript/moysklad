<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Exclude;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\ExclusionPolicy;

/**
* ExclusionPolicy("all")
*/
class Bundle extends AbstractProduct
{
    /**
     * @Type("string")
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    private $paymentItemType;

    /**
     * @Type("string")
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    private $trackingType;

    /**
     * @Type("string")
     * @Generator()
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    public $article;

    /**
     * @Type("string")
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    public $tnved;

    /**
     * @Type("int")
     * @Generator()
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    public $weight;

    /**
     * @Type("int")
     * @Generator()
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    public $volume;

    /**
     * @Type("string")
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     * @SkipWhenEmpty
     */
    public $syncId;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     * Exclude(if="!count(object)")
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    public $attributes = [];

    /**
     * @Type("MoySklad\Entity\Uom")
     * @Generator(type="object")
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    public $uom;

    /**
     * @Type("MoySklad\Entity\Price")
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    public $minPrice;

    /**
     * @Type("MoySklad\Entity\Price")
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    public $overhead;

    /**
     * @Type("MoySklad\Entity\Country")
     * @Generator(type="object")
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    public $country;

    /**
     * @Type("array<MoySklad\Entity\Component>")
     * @Generator(type="objectArray")
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    public $components;

    /**
     * @Type("MoySklad\Entity\ListEntity")
     * Exclude(if="empty(object)")
     * Expose
     * Groups({"get"})
     */
    public $images;

    /**
     * @Type("array<MoySklad\Entity\Price>")
     * Exclude(if="empty(object)")
     * Exclude(if="!count(object)")
     * Expose
     * Groups({"get"})
     */
    public $salePrices = [];

    /**
     * @Type("array<MoySklad\Entity\Barcode>")
     * Exclude(if="empty(object)")
     * Exclude(if="!count(object)")
     * Expose
     * Groups({"get"})
     */
    public $barcodes = [];

    /**
     * @return string
     */
    public function getPaymentItemType(): string
    {
        return self::PRODUCT_PAYMENT_ITEM_TYPES[$this->paymentItemType];
    }

    /**
     * @return string
     */
    public function getTrackingType(): string
    {
        return self::TRACKING_TYPES[$this->trackingType];
    }
}
