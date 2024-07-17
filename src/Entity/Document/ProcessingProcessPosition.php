<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\Meta;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class ProcessingProcessPosition extends MetaEntity
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
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object", anyFromExists=true)
     */
    public $meta;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object", anyFromExists=true, expand=true)
     */
    public $processingStage;
}
