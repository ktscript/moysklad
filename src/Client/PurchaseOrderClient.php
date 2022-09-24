<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\DeleteEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetMetadataAttributeEndpoint;
use MoySklad\Client\Endpoint\PostEntitiesEndpoint;
use MoySklad\Client\Endpoint\PostEntityEndpoint;
use MoySklad\Client\Endpoint\PutEntityEndpoint;
use MoySklad\Client\Endpoint\FirstEntityEndpoint;
use MoySklad\Client\Endpoint\GetMetadataEndpoint;
use MoySklad\Client\Endpoint\GetAdditionalMetadataEndpoint;
use MoySklad\Entity\AbstractListEntity;
use MoySklad\Entity\Document\PurchaseOrder;
use MoySklad\Entity\ListEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class PurchaseOrderClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        GetEntityEndpoint,
	FirstEntityEndpoint,
        PutEntityEndpoint,
        PostEntityEndpoint,
        DeleteEntityEndpoint,
        GetMetadataAttributeEndpoint,
        PostEntitiesEndpoint,
	GetMetadataEndpoint,
	GetAdditionalMetadataEndpoint,
        DeleteEntitiesEndpoint;

    /**
     * CustomerOrderClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/purchaseorder/');
    }

    /**
     * @param string $startDate Дата в формате Y-m-d
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function getListByDate(string $startDate, array $params = []): AbstractListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path(
            $this->getApi(),
            $this->getPath() . '?' . http_build_query(['startDate' => $startDate])
        )
            ->params($params)
            ->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $search
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function search(string $search, array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path(
            $this->getApi(),
            $this->getPath() . '?' . http_build_query(['search' => $search])
        )
             ->params($params)
             ->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return PurchaseOrder::class;
    }
}
