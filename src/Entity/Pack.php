<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;
use MoySklad\Util\Object\Annotation\Generator;

class Pack
{
    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("int")
     * @Generator()
     */
    public $quantity;

    /**
     * @Type("MoySklad\Entity\Uom")
     * @Generator(type="object")
     */
    public $uom;

    /**
     * @Type("array<MoySklad\Entity\Barcode>")
     */
    public $barcodes;
}
