<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

class WebHook extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $entityType;

    /**
     * @Type("string")
     */
    public $url;

    /**
     * @Type("string")
     */
    public $method;

    /**
     * @Type("string")
     */
    public $action;

    /**
     * @Type("bool")
     */
    public $enabled;
}
