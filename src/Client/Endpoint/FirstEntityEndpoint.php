<?php

namespace MoySklad\Client\Endpoint;

use Exception;
use MoySklad\Client\EntityClientBase;
use MoySklad\Entity\MetaEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;
use MoySklad\Entity\AbstractListEntity;
use MoySklad\Entity\ListEntity;

use MoySklad\Util\Param\Limit;
use MoySklad\Util\Param\Offset;
use MoySklad\Util\Param\Order;
use MoySklad\Util\Param\Search;
use MoySklad\Util\Param\EntityFilter;
use MoySklad\Util\Param\StandardFilter;

trait FirstEntityEndpoint
{
    /**
     * @param Param[] $params
     * @return MetaEntity
     * @throws ApiClientException
     * @throws Exception
     */
    public function first($param_name = 'code', $param_val = null): ?MetaEntity
    {
        if ( get_parent_class($this) !== EntityClientBase::class ) {
            throw new \Exception('The trait cannot be used outside the EntityClientBase class');
        }

        /** @var $entity MetaEntity */
        $entity = !is_null($param_val) && !is_null($param_name)
            ? RequestExecutor::path($this->getApi(), $this->getPath())
                        ->params([StandardFilter::eq($param_name, $param_val), Limit::eq(1)])
                        ->getOneFromMany($this->getMetaEntityClass())
            : RequestExecutor::path($this->getApi(), $this->getPath())
                        ->getOneFromMany($this->getMetaEntityClass());

        return $entity;
    }

}
