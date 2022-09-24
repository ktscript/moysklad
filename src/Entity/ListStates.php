<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

/**
 * Класс для получения списка статусов заказов
 */
class ListStates extends AbstractListEntity
{
    /**
     * @Type("array<MoySklad\Entity\State>")
     */
    public $states;
}
