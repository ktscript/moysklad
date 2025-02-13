<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class File extends MetaEntity
{
    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $created;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object")
     */
    public $createdBy;

    /**
     * @Type("string")
     * @Generator()
     */
    public $filename;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object")
     */
    public $meta;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object")
     */
    public $miniature;

    /**
     * @Type("int")
     * @Generator()
     */
    public $size;

    /**
     * @Type("MoySklad\Entity\Meta")
     * @Generator(type="object")
     */
    public $tiny;

    /**
     * @Type("string")
     * @Generator()
     */
    public $title;
}
