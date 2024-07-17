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
use MoySklad\Entity\Document\ProductionTaskPosition;
use MoySklad\Entity\Image;
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\Product\Product;
use MoySklad\Entity\Document\ProductionTaskProduct;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

/**
 * Class ProductionTaskClient
 * @package MoySklad\Client
 */
class ProductionTaskClient extends EntityClientBase
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
     * ProductionTaskClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/productiontask/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return ProductionTask::class;
    }

    /**
     * @param string $productionTaskId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getPositions(string $productionTaskId, array $params = []): ListEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $productionTaskId . '/productionrows')
            ->params($params)
            ->get(ListEntity::class);
    }

    /**
     * @param string $productionTaskId
     * @param string $positionId
     * @return ProductionTaskPosition
     * @throws ApiClientException
     */
    public function getPosition(string $productionTaskId, string $positionId): ProductionTaskPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $productionTaskId . '/productionrows/' . $positionId)
            ->get(ProductionTaskPosition::class);
    }

    /**
     * @param string $productionTaskId
     * @param string $positionId
     * @param ProductionTaskPosition $updatedPosition
     * @return ProductionTaskPosition
     * @throws ApiClientException
     */
    public function updatePosition(string $productionTaskId, string $positionId, ProductionTaskPosition $updatedPosition): ProductionTaskPosition
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $productionTaskId . '/productionrows/' . $positionId)
            ->body($updatedPosition)
            ->put(ProductionTaskPosition::class);
    }

    /**
     * @param string $productionTaskId
     * @param string $positionId
     * @throws ApiClientException
     */
    public function deletePosition(string $productionTaskId, string $positionId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $productionTaskId . '/productionrows/' . $positionId)
            ->delete();
    }

    /**
     * @param string $productiontaskId
     * @param ProductionTaskProduct $productionTaskProduct
     * @return AbstractListEntity
     * @throws ApiClientException
     */
    public function createProduct(string $productiontaskId, ProductionTaskProduct $productionTaskProduct): AbstractListEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $productiontaskId . '/products')
            ->body($productionTaskProduct)
            ->post($this->getMetaEntityClass());
    }

    /**
     * @param string $productiontaskId
     * @param array $productionTaskProducts
     * @return array
     * @throws ApiClientException
     */
    public function createProducts(string $productiontaskId, array $productionTaskProducts): array
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $productiontaskId . '/products')
            ->bodyArray($productionTaskProducts)
            ->post("array<{$this->getMetaEntityClass()}>");
    }

    /**
     * @param string $productiontaskId
     * @param string $productionTaskProductId
     * @return ProductionTaskProduct
     * @throws ApiClientException
     */
    public function getProduct(string $productiontaskId, string $productionTaskProductId): ProductionTaskProduct
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $productiontaskId . '/products/' . $productionTaskProductId)
            ->get(ProductionTaskProduct::class);
    }

    /**
     * @param string $productiontaskId
     * @param string $productionTaskProductId
     * @param ProductionTaskProduct $updatedProductionTaskProduct
     * @return ProductionTaskProduct
     * @throws ApiClientException
     */
    public function updateProduct(string $productiontaskId, string $productionTaskProductId, ProductionTaskProduct $updatedProductionTaskProduct): ProductionTaskProduct
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $productiontaskId . '/products/' . $productionTaskProductId)
            ->body($updatedProductionTaskProduct)
            ->put(ProductionTaskProduct::class);
    }

    /**
     * @param string $productiontaskId
     * @param string $productionTaskProductId
     * @throws ApiClientException
     */
    public function deleteProduct(string $productiontaskId, string $productionTaskProductId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $productiontaskId . '/products/' . $productionTaskProductId)
            ->delete();
    }

    /**
     * @param string $productiontaskId
     * @param array $productionTaskProductIds
     * @throws ApiClientException
     */
    public function deleteProducts(string $productiontaskId, array $productionTaskProductIds): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $productiontaskId . '/products/delete')
            ->body($productionTaskProductIds)
            ->post();
    }
}
