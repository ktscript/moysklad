<?php

namespace MoySklad\Client\Endpoint;

use MoySklad\Client\EntityClientBase;
use MoySklad\Entity\MetaEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

trait PutOnlyEntityEndpoint
{
    /**
     * @param MetaEntity $updatedEntity
     * @return MetaEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function link(MetaEntity $updatedEntity): MetaEntity
    {
        if (get_parent_class($this) !== EntityClientBase::class) {
            throw new \Exception('The trait cannot be used outside the EntityClientBase class');
        }

        return RequestExecutor::path($this->getApi(), $this->getPath())->body($updatedEntity)->put($this->getMetaEntityClass());
    }
}
