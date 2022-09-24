<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;
use MoySklad\Entity\MetaEntity;

class ByStoreProductStock extends MetaEntity
{
    /**
     * @var array
     * @Type("array<MoySklad\Entity\Product\ProductStoreStock>")
     */
    public $stockByStore = [];
}