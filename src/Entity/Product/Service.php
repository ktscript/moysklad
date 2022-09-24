<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\ExclusionPolicy;

/**
* ExclusionPolicy("all")
*/
class Service extends AbstractProduct
{
    /**
     * @Type("string")
     */
    private $paymentItemType;

    /**
     * @Type("string")
     */
    public $syncId;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     * Exclude(if="!count(object)")
     */
    public $attributes = [];

    /**
     * @Type("MoySklad\Entity\Uom")
     * @Generator(type="object")
     */
    public $uom;

    /**
     * @Type("MoySklad\Entity\Price")
     */
    public $minPrice;

    /**
     * @Type("MoySklad\Entity\Price")
     */
    public $buyPrice;

    /**
     * @Type("array<MoySklad\Entity\Price>")
     */
    public $salePrices = [];

    /**
     * @Type("array<MoySklad\Entity\Barcode>")
     */
    public $barcodes = [];

    /**
     * @return string
     */
    public function getPaymentItemType(): string
    {
        return self::SERVICE_PAYMENT_ITEM_TYPES[$this->paymentItemType];
    }
}
