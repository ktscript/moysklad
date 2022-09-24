<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\Groups;

class Image extends MetaEntity
{
    /**
     * @Type("string")
     * @Generator()
     */
    public $title;

    /**
     * @Type("string")
     * @Generator()
     */
    public $filename;

    /**
     * @Type("int")
     * @Generator()
     */
    public $size;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object")
     */
    public $miniature;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object")
     */
    public $tiny;
}
