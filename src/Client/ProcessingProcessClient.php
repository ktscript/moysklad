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
use MoySklad\Entity\Document\ProcessingProcessPosition;
use MoySklad\Entity\ListEntity;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

/**
 * Class ProcessingProcessClient
 * @package MoySklad\Client
 */
class ProcessingProcessClient extends EntityClientBase
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
     * ProcessingProcessClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/processingprocess/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return ProcessingProcess::class;
    }

    /**
     * @param string $processingProcessId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getPositions(string $processingProcessId, array $params = []): ListEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingProcessId . '/positions')
            ->params($params)
            ->get(ListEntity::class);
    }

    /**
     * @param string $processingProcessId
     * @param string $positionId
     * @return ProcessingProcessPosition
     * @throws ApiClientException
     */
    public function getPosition(string $processingProcessId, string $positionId): ProcessingProcessPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingProcessId . '/positions/' . $positionId)
            ->get(ProcessingProcessPosition::class);
    }

    /**
     * @param string $processingProcessId
     * @param string $positionId
     * @param ProcessingProcessPosition $updatedPosition
     * @return ProcessingProcessPosition
     * @throws ApiClientException
     */
    public function updatePosition(string $processingProcessId, string $positionId, ProcessingProcessPosition $updatedPosition): ProcessingProcessPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingProcessId . '/positions/' . $positionId)
            ->body($updatedPosition)
            ->put(ProcessingProcessPosition::class);
    }

    /**
     * @param string $processingProcessId
     * @param string $positionId
     * @throws ApiClientException
     */
    public function deletePosition(string $processingProcessId, string $positionId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingProcessId . '/positions/' . $positionId)
            ->delete();
    }

    /**
     * @param string $processingProcessId
     * @param array $processingProcessPositions
     * @return array
     * @throws ApiClientException
     */
    public function createPositions(string $processingProcessId, array $processingProcessPositions): array
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingProcessId . '/positions')
            ->bodyArray($processingProcessPositions)
            ->post("array<ProcessingProcessPosition>");
    }

    /**
     * @param string $processingProcessId
     * @param string $processingProcessPositionId
     * @param ProcessingProcessPosition $updatedProcessingProcessPosition
     * @return ProcessingProcessPosition
     * @throws ApiClientException
     */
    public function updateProcessingProcessPosition(string $processingProcessId, string $processingProcessPositionId, ProcessingProcessPosition $updatedProcessingProcessPosition): ProcessingProcessPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingProcessId . '/positions/' . $processingProcessPositionId)
            ->body($updatedProcessingProcessPosition)
            ->put(ProcessingProcessPosition::class);
    }

    /**
     * @param string $processingProcessId
     * @param array $processingProcessPositionIds
     * @throws ApiClientException
     */
    public function deletePositions(string $processingProcessId, array $processingProcessPositionIds): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingProcessId . '/positions/delete')
            ->body($processingProcessPositionIds)
            ->post();
    }
}
