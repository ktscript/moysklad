<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\ApiClient;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

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
    protected $meta;

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
            if ($v) $this->{$k} = $v;    
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
