<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class ProductionTaskProduct extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $accountId;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $assortment;

    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("float")
     */
    public $planQuantity;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $productionRow;
}
