<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\DeleteEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Client\Endpoint\GetMetadataAttributeEndpoint;
use MoySklad\Client\Endpoint\PostEntitiesEndpoint;
use MoySklad\Client\Endpoint\PostEntityEndpoint;
use MoySklad\Client\Endpoint\PutEntityEndpoint;
use MoySklad\Entity\AbstractListEntity;
use MoySklad\Entity\Document\Demand;
use MoySklad\Entity\Document\DemandPosition;
use MoySklad\Entity\ListEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class DemandPositionClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        GetEntityEndpoint,
        PutEntityEndpoint,
        PostEntityEndpoint,
        DeleteEntityEndpoint,
        GetMetadataAttributeEndpoint,
        PostEntitiesEndpoint,
        DeleteEntitiesEndpoint;

    /**
     * RetailDemandClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, "/entity/demand/");
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return DemandPosition::class;
    }

    public function createPosition(string $demandId, DemandPosition $demandPosition): AbstractListEntity
    {
        /** @var DemandPosition $demandPosition */
        return RequestExecutor::path($this->getApi(), $this->getPath().$demandId.'/positions')->body($demandPosition)->post($this->getMetaEntityClass());
    }

    public function createPositions(string $demandId, array $demandPositions): array
    {
        /** @var DemandPosition[] $demandPositions */
        return RequestExecutor::path($this->getApi(), $this->getPath().$demandId.'/positions')->bodyArray($demandPositions)->post("array<{$this->getMetaEntityClass()}>");
    }
}
