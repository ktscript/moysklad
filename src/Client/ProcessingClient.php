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
use MoySklad\Entity\Document\ProcessingPosition;
use MoySklad\Entity\Document\Processing;
use MoySklad\Entity\ListEntity;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

/**
 * Class ProcessingClient
 * @package MoySklad\Client
 */
class ProcessingClient extends EntityClientBase
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
     * ProcessingClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/processing/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Processing::class;
    }

    /**
     * @param string $processingId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getPositions(string $processingId, array $params = []): ListEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/positions')
            ->params($params)
            ->get(ListEntity::class);
    }

    /**
     * @param string $processingId
     * @param string $positionId
     * @return ProcessingPosition
     * @throws ApiClientException
     */
    public function getPosition(string $processingId, string $positionId): ProcessingPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/positions/' . $positionId)
            ->get(ProcessingPosition::class);
    }

    /**
     * @param string $processingId
     * @param string $positionId
     * @param ProcessingPosition $updatedPosition
     * @return ProcessingPosition
     * @throws ApiClientException
     */
    public function updatePosition(string $processingId, string $positionId, ProcessingPosition $updatedPosition): ProcessingPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/positions/' . $positionId)
            ->body($updatedPosition)
            ->put(ProcessingPosition::class);
    }

    /**
     * @param string $processingId
     * @param string $positionId
     * @throws ApiClientException
     */
    public function deletePosition(string $processingId, string $positionId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/positions/' . $positionId)
            ->delete();
    }

    /**
     * @param string $processingId
     * @param array $processingPositions
     * @return array
     * @throws ApiClientException
     */
    public function createPositions(string $processingId, array $processingPositions): array
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/positions')
            ->bodyArray($processingPositions)
            ->post("array<{$this->getMetaEntityClass()}>");
    }

    /**
     * @param string $processingId
     * @param array $processingPositionIds
     * @throws ApiClientException
     */
    public function updateProcessingPosition(string $processingId, array $processingPositionIds): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/positions')
            ->body($processingPositionIds)
            ->put();
    }

    /**
     * @param string $processingId
     * @param array $processingPositionIds
     * @throws ApiClientException
     */
    public function deletePositions(string $processingId, array $processingPositionIds): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/positions/delete')
            ->body($processingPositionIds)
            ->post();
    }

    /**
     * @param string $id
     * @param Processing $updatedProcessing
     * @return Processing
     * @throws ApiClientException
     */
    public function updateProcessingById(string $id, Processing $updatedProcessing): Processing
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $id)
            ->body($updatedProcessing)
            ->put(Processing::class);
    }

    /**
     * @param string $processingId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getProducts(string $processingId, array $params = []): ListEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/products')
            ->params($params)
            ->get(ListEntity::class);
    }

    /**
     * @param string $processingId
     * @param string $productId
     * @return ProcessingPosition
     * @throws ApiClientException
     */
    public function getProduct(string $processingId, string $productId): ProcessingPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/products/' . $productId)
            ->get(ProcessingPosition::class);
    }

    /**
     * @param string $processingId
     * @param ProcessingPosition $newProduct
     * @return ProcessingPosition
     * @throws ApiClientException
     */
    public function addProduct(string $processingId, ProcessingPosition $newProduct): ProcessingPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/products')
            ->body($newProduct)
            ->post(ProcessingPosition::class);
    }

    /**
     * @param string $processingId
     * @param string $productId
     * @param ProcessingPosition $updatedProduct
     * @return ProcessingPosition
     * @throws ApiClientException
     */
    public function updateProduct(string $processingId, string $productId, ProcessingPosition $updatedProduct): ProcessingPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/products/' . $productId)
            ->body($updatedProduct)
            ->put(ProcessingPosition::class);
    }

    /**
     * @param string $processingId
     * @param string $productId
     * @throws ApiClientException
     */
    public function deleteProduct(string $processingId, string $productId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/products/' . $productId)
            ->delete();
    }

    /**
     * @param string $processingId
     * @param array $productIds
     * @throws ApiClientException
     */
    public function deleteProducts(string $processingId, array $productIds): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingId . '/products/delete')
            ->body($productIds)
            ->post();
    }
}
