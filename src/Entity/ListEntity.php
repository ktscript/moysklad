<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

/**
 * Базовый класс для методов получения списка сущностей
 */
class ListEntity extends AbstractListEntity
{
    /**
     * @Type("MoySklad\Entity\Context")
     */
    public $context;

    /**
     * @Type("array<MoySklad\Entity\MetaEntity>")
     */
    public $rows;
}
