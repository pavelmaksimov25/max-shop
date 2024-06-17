<?php

declare(strict_types=1);

namespace Modules\Product\UseCases;

use Modules\Product\DataTransferObjects\ProductResponseTransfer;
use Modules\Product\DataTransferObjects\ProductTransfer;
use Modules\Product\Repository\ProductRepository;
use Modules\Product\Services\SkuGenerator;

final readonly class CreateProductUseCase
{
    public function __construct(private ProductRepository $productRepository, private SkuGenerator $skuGenerator)
    {
    }

    public function handle(ProductTransfer $productTransfer): ProductResponseTransfer
    {
        $sku = $this->skuGenerator->generate($productTransfer);
        $productTransfer->setSku($sku);

        $model = $this->productRepository->create($productTransfer);

        $productTransfer = ProductTransfer::fromModel($model);

        return new ProductResponseTransfer($productTransfer);
    }
}
