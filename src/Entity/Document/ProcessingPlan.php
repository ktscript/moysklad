<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class ProcessingPlan extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $accountId;

    /**
     * @Type("bool")
     * @Generator()
     */
    public $archived;

    /**
     * @Type("string")
     * @Generator()
     */
    public $code;

    /**
     * @Type("double")
     * @Generator()
     */
    public $cost;

    /**
     * @Type("string")
     * @Generator(
     *     values={
     *         "BY_PRICE",
     *         "BY_PRODUCTION"
     *     }
     * )
     */
    // Особенности: Для costDistributionType значение BY_PRODUCTION доступно только для техкарт с двумя и более позициями продукции. При изменении количества позиций продукции на значение меньшее, чем 2 автоматически меняется на BY_PRICE.
    public $costDistributionType;

    /**
     * @Type("string")
     * @Generator()
     */
    public $externalCode;

    /**
     * @Type("MoySklad\Entity\Group")
     * @Generator(type="object", anyFromExists=true)
     */
    public $group;

    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("array<MoySklad\Entity\Document\ProcessingPlanStage>")
     * @Generator(type="objectArray")
     */
    public $stages = [];

    /**
     * @Type("array<MoySklad\Entity\Document\ProcessingPlanMaterial>")
     * @Generator(type="objectArray")
     */
    public $materials = [];

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $meta;

    /**
     * @Type("string")
     * @Generator()
     */
    public $name;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;

    /**
     * @Type("MoySklad\Entity\Group")
     * @Generator(type="object", anyFromExists=true)
     */
    public $parent;

    /**
     * @Type("string")
     */
    public $pathName;

    /**
     * @Type("MoySklad\Entity\Document\ProcessingProcess")
     * @Generator(type="object", anyFromExists=true)
     */
    public $processingProcess;

    /**
     * @Type("array<MoySklad\Entity\Document\ProcessingPlanProduct>")
     * @Generator(type="objectArray")
     */
    public $products = [];

    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;
}
