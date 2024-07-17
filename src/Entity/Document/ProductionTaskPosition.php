<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class ProductionTaskPosition extends MetaEntity
{
    /**
     * @Type("string")
     * @Generator(type="uuid")
     */
    public $accountId;

    /**
     * @Type("string")
     */
    public $externalCode;

    /**
     * @Type("string")
     * @Generator(type="uuid")
     */
    public $id;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $processingPlan;

    /**
     * @Type("float")
     */
    public $productionVolume;

    /**
     * @Type("DateTime<'Y-m-d\TH:i:s.v\Z'>")
     */
    public $updated;
}
