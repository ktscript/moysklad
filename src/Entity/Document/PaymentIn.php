<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

use MoySklad\Entity\ListEntity;

/**
 * Оприходование товара
 */
class PaymentIn extends MetaEntity
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
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $deleted;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $description;

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
     */
    public $sum;

    /**
     * @Type("float")
     */
    public $vatSum;

    /**
     * @Type("MoySklad\Entity\Agent\Organization")
     * @Generator(type="object")
     */
    public $organization;

    /**
     * @Type("string")
     */
    public $paymentPurpose;

    /**
     * @Type("MoySklad\Entity\Agent\Counterparty")
     * @Generator(type="object")
     */
    public $agent;

    /**
     * @Type("MoySklad\Entity\ExpenseItem")
     * @Generator(type="object")
     */
    public $expenseItem;

    /**
     * @Type("MoySklad\Entity\Contract")
     */
    public $contract;

    /**
     * @Type("MoySklad\Entity\State")
     */
    public $state;
    
}
