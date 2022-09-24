<?php

namespace MoySklad\Entity\Discount;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

class BonusProgram extends Discount
{
    /**
     * @Type("int")
     */
    public $earnRateRoublesToPoint;

    /**
     * @Type("int")
     */
    public $spendRatePointsToRouble;

    /**
     * @Type("int")
     */
    public $maxPaidRatePercents;
}
