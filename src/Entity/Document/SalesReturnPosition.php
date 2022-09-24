<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class SalesReturnPosition extends MetaEntity
{
    /**
     * @Type("int")
     * @Generator(min=1, max=100)
     * Exclude(if="empty(object)")
     * Groups({"get"})
     */
    public $quantity;

    /**
     * @Type("int")
     * @Generator()
     * Exclude(if="empty(object)")
     * Groups({"get"})
     */
    public $price;

    /**
     * @Type("int")
     * @Generator(type="negativeInt")
     * Exclude(if="empty(object)")
     * Groups({"get"})
     */
    public $discount;

    /**
     * @Type("int")
     * @Generator(min=1, max=100)
     * Exclude(if="empty(object)")
     * Groups({"get"})
     */
    public $vat;

    /**
     * @Type("MoySklad\Entity\Product\Product")
     * Exclude(if="empty(object)")
     * Groups({"get"})
     */
    public $assortment;

    /**
     * @Type("MoySklad\Entity\Pack")
     * Exclude(if="empty(object)")
     * Groups({"get"})
     */
    public $pack;

    /**
     * @Type("array")
     * @Generator()
     * Exclude(if="empty(object)")
     * Groups({"get"})
     */
    public $things;

    /**
     * @Type("int")
     * @Generator()
     * Exclude(if="empty(object)")
     * Groups({"get"})
     */
    public $cost;
}
