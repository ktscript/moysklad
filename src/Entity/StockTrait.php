<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\Groups;

/**
 * Trait StockTrait
 * @package MoySklad\Entity
 *
 * Трейт сущностей, которые хранятся на складе - товары и варианты
 * Данные поля по большей части используются только в отчёте остатков и ассортименте, но отсутствуют в списке товаров
 * Но поскольку у нас формат респонса типизованный и вендор задал тип Product или Variant, то придётся добавить в них все когда-либо использованные поля
 *
 * При этом, на них нельзя повесить генераторы для тестов, потому что тогда упадут тесты создания базовых сущностей
 * А уж как тогда тестировать отчёты... разве что только руками
 *
 * @copyright CDEK.MARKET, Ltd. (ООО «СДЭК.МАРКЕТ» http://cdek.market)
 * @project ms-lib
 * @date 19.05.2020 14:32
 * @author Viktor.Fursenko
 */
trait StockTrait
{
    /**
     * @Type("string")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $article;

    /**
     * Базовая цена
     * @Type("int")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $price;

    /**
     * Скидочная цена
     * @Type("int")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $salePrice;

    /**
     * @Type("MoySklad\Entity\Uom")
     * @var Uom
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $uom;

    /**
     * @Type("float")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $stock;

    /**
     * @Type("float")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $inTransit;

    /**
     * @Type("float")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $reserve;

    /**
     * @Type("float")
     * Groups({"get"})
     * Exclude(if="empty(object)")
     */
    public $quantity;
}
