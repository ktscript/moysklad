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
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\Document\ProcessingPlan;
use MoySklad\Entity\Document\ProcessingPlanStage;
use MoySklad\Entity\Document\ProcessingPlanMaterial;
use MoySklad\Entity\Document\ProcessingPlanProduct;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class ProcessingPlanClient extends EntityClientBase
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
     * ProcessingPlanClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/processingplan/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return ProcessingPlan::class;
    }

    /**
     * @param string $processingPlanId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getStages(string $processingPlanId, array $params = []): ListEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/stages')
            ->params($params)
            ->get(ListEntity::class);
    }

    /**
     * @param string $processingPlanId
     * @param string $stageId
     * @return ProcessingPlanStage
     * @throws ApiClientException
     */
    public function getStage(string $processingPlanId, string $stageId): ProcessingPlanStage
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/stages/' . $stageId)
            ->get(ProcessingPlanStage::class);
    }

    /**
     * @param string $processingPlanId
     * @param string $stageId
     * @param ProcessingPlanStage $updatedStage
     * @return ProcessingPlanStage
     * @throws ApiClientException
     */
    public function updateStage(string $processingPlanId, string $stageId, ProcessingPlanStage $updatedStage): ProcessingPlanStage
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/stages/' . $stageId)
            ->body($updatedStage)
            ->put(ProcessingPlanStage::class);
    }

    /**
     * @param string $processingPlanId
     * @param string $stageId
     * @throws ApiClientException
     */
    public function deleteStage(string $processingPlanId, string $stageId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/stages/' . $stageId)
            ->delete();
    }

    /**
     * @param string $processingPlanId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getMaterials(string $processingPlanId, array $params = []): ListEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/materials')
            ->params($params)
            ->get(ListEntity::class);
    }

    /**
     * @param string $processingPlanId
     * @param string $materialId
     * @return ProcessingPlanMaterial
     * @throws ApiClientException
     */
    public function getMaterial(string $processingPlanId, string $materialId): ProcessingPlanMaterial
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/materials/' . $materialId)
            ->get(ProcessingPlanMaterial::class);
    }

    /**
     * @param string $processingPlanId
     * @param ProcessingPlanMaterial[] $materials
     * @return ListEntity
     * @throws ApiClientException
     */
    public function createMaterials(string $processingPlanId, array $materials): ListEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/materials')
            ->body($materials)
            ->post(ListEntity::class);
    }

    /**
     * @param string $processingPlanId
     * @param string $materialId
     * @param ProcessingPlanMaterial $updatedMaterial
     * @return ProcessingPlanMaterial
     * @throws ApiClientException
     */
    public function updateMaterial(string $processingPlanId, string $materialId, ProcessingPlanMaterial $updatedMaterial): ProcessingPlanMaterial
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/materials/' . $materialId)
            ->body($updatedMaterial)
            ->put(ProcessingPlanMaterial::class);
    }

    /**
     * @param string $processingPlanId
     * @param string $materialId
     * @throws ApiClientException
     */
    public function deleteMaterial(string $processingPlanId, string $materialId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/materials/' . $materialId)
            ->delete();
    }

    /**
     * @param string $processingPlanId
     * @param array $materialMetas
     * @throws ApiClientException
     */
    public function deleteMaterials(string $processingPlanId, array $materialMetas): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/materials/delete')
            ->body($materialMetas)
            ->post();
    }

    /**
     * @param string $processingPlanId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getProducts(string $processingPlanId, array $params = []): ListEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/products')
            ->params($params)
            ->get(ListEntity::class);
    }

    /**
     * @param string $processingPlanId
     * @param string $productId
     * @return ProcessingPlanProduct
     * @throws ApiClientException
     */
    public function getProduct(string $processingPlanId, string $productId): ProcessingPlanProduct
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/products/' . $productId)
            ->get(ProcessingPlanProduct::class);
    }

    /**
     * @param string $processingPlanId
     * @param ProcessingPlanProduct[] $products
     * @return ListEntity
     * @throws ApiClientException
     */
    public function createProducts(string $processingPlanId, array $products): ListEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/products')
            ->body($products)
            ->post(ListEntity::class);
    }

    /**
     * @param string $processingPlanId
     * @param string $productId
     * @param ProcessingPlanProduct $updatedProduct
     * @return ProcessingPlanProduct
     * @throws ApiClientException
     */
    public function updateProduct(string $processingPlanId, string $productId, ProcessingPlanProduct $updatedProduct): ProcessingPlanProduct
    {
        return RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/products/' . $productId)
            ->body($updatedProduct)
            ->put(ProcessingPlanProduct::class);
    }

    /**
     * @param string $processingPlanId
     * @param string $productId
     * @throws ApiClientException
     */
    public function deleteProduct(string $processingPlanId, string $productId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/products/' . $productId)
            ->delete();
    }

    /**
     * @param string $processingPlanId
     * @param array $productMetas
     * @throws ApiClientException
     */
    public function deleteProducts(string $processingPlanId, array $productMetas): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath() . $processingPlanId . '/products/delete')
            ->body($productMetas)
            ->post();
    }
}
