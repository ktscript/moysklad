<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SkipWhenEmpty;

use MoySklad\ApiClient;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Object\Annotation\Generator;


class MetaEntity
{
    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("string")
     */
    public $accountId;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $meta;

    /**
     * MetaEntity constructor
     *
     * @param Meta|null $meta
     */
    public function __construct(?Meta $meta = null)
    {
        if ($meta) {
            $this->meta = $meta;
        }
    }

    /**
     * @param ApiClient $api
     * @throws ApiClientException
     * @throws \Exception
     */
    public function fetch(ApiClient $api): void
    {
        if (empty($this->meta->href)) {
            throw new \Exception("The entity has not metadata.");
        }

        $fetched = RequestExecutor::url($api, $this->meta->href)->get(get_class($this));

        foreach ($this as $property => &$value) {
            $value = $fetched->$property;
        }
    }

    public function fill($attr = [])
    {
        array_map(function($k, $v) {
            $this->{$k} = $v;    
        }, array_keys($attr), array_values($attr));

        return $this;
    }

    /**
     * @return Meta|null
     */
    public function getMeta(): ?Meta
    {
        return $this->meta;
    }
}
