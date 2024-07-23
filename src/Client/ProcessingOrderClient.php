<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\DeleteEntityEndpoint;
use MoySklad\Client\Endpoint\FirstEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Client\Endpoint\GetMetadataAttributeEndpoint;
use MoySklad\Client\Endpoint\GetMetadataEndpoint;
use MoySklad\Client\Endpoint\PostEntitiesEndpoint;
use MoySklad\Client\Endpoint\PostEntityEndpoint;
use MoySklad\Client\Endpoint\PutEntityEndpoint;
use MoySklad\Entity\AbstractListEntity;
use MoySklad\Entity\Document\ProcessingOrderPosition;
use MoySklad\Entity\Document\ProcessingOrder;
use MoySklad\Entity\ListEntity;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

/**
 * Class ProcessingOrderClient
 * @package MoySklad\Client
 */
class ProcessingOrderClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        FirstEntityEndpoint,
        PostEntityEndpoint,
        PostEntitiesEndpoint,
        DeleteEntityEndpoint,
        DeleteEntitiesEndpoint,
        GetMetadataEndpoint,
        GetMetadataAttributeEndpoint,
        GetEntityEndpoint,
        PutEntityEndpoint;

    /**
     * ProcessingOrderClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/processingorder/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return ProcessingOrder::class; // Adjust according to your actual class name
    }

    /**
     * @param string $processingOrderId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getPositions(string $processingOrderId, array $params = []): ListEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingOrderId . '/positions')
            ->params($params)
            ->get(ListEntity::class);
    }

    /**
     * @param string $processingOrderId
     * @param string $positionId
     * @return ProcessingOrderPosition
     * @throws ApiClientException
     */
    public function getPosition(string $processingOrderId, string $positionId): ProcessingOrderPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingOrderId . '/positions/' . $positionId)
            ->get(ProcessingOrderPosition::class);
    }

    /**
     * @param string $processingOrderId
     * @param string $positionId
     * @param ProcessingOrderPosition $updatedPosition
     * @return ProcessingOrderPosition
     * @throws ApiClientException
     */
    public function updatePosition(string $processingOrderId, string $positionId, ProcessingOrderPosition $updatedPosition): ProcessingOrderPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingOrderId . '/positions/' . $positionId)
            ->body($updatedPosition)
            ->put(ProcessingOrderPosition::class);
    }

    /**
     * @param string $processingOrderId
     * @param string $positionId
     * @throws ApiClientException
     */
    public function deletePosition(string $processingOrderId, string $positionId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingOrderId . '/positions/' . $positionId)
            ->delete();
    }

    /**
     * @param string $processingOrderId
     * @param array $processingOrderPositions
     * @return array
     * @throws ApiClientException
     */
    public function createPositions(string $processingOrderId, array $processingOrderPositions): array
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingOrderId . '/positions')
            ->bodyArray($processingOrderPositions)
            ->post("array<{$this->getMetaEntityClass()}>");
    }

    /**
     * @param string $processingOrderId
     * @param array $processingOrderPositionIds
     * @throws ApiClientException
     */
    public function updateProcessingOrderPosition(string $processingOrderId, array $processingOrderPositionIds): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingOrderId . '/positions')
            ->body($processingOrderPositionIds)
            ->put();
    }

    /**
     * @param string $processingOrderId
     * @param array $processingOrderPositionIds
     * @throws ApiClientException
     */
    public function deletePositions(string $processingOrderId, array $processingOrderPositionIds): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingOrderId . '/positions/delete')
            ->body($processingOrderPositionIds)
            ->post();
    }
}
