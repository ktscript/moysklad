<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class ProcessingStage extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $accountId;

    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("double")
     * @Generator()
     */
    public $cost;

    /**
     * @Type("double")
     * @Generator()
     */
    public $labourCost;

    /**
     * @Type("double")
     * @Generator()
     */
    public $standardHour;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object", anyFromExists=true)
     */
    public $processingProcessPosition;
}
