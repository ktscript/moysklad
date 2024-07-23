<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class ProcessingOrderPosition extends MetaEntity
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
     * @Type("array")
     * @Generator(type="object")
     */
    public $pack;

    /**
     * @Type("double")
     */
    public $quantity;

    /**
     * @Type("double")
     */
    public $reserve;
}
