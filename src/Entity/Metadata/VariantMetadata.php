<?php

namespace MoySklad\Entity\Metadata;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;

class VariantMetadata extends Metadata
{
    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     */
    public $characteristics = [];
}
