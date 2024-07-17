<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class ProcessingPlanMaterial extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $accountId;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object", anyFromExists=true)
     */
    public $assortment;

    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object", anyFromExists=true)
     */
    public $product;

    /**
     * @Type("float")
     * @Generator()
     */
    public $quantity;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object", anyFromExists=true)
     */
    public $processingProcessPosition;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $materialProcessingPlan;
}
