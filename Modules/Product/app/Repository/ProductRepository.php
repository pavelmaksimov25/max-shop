<?php

declare(strict_types=1);

namespace Modules\Product\Repository;

use Modules\Product\DataTransferObjects\ProductTransfer;
use Modules\Product\Models\Product;

class ProductRepository
{
    public function create(ProductTransfer $productTransfer): Product
    {
        $product = new Product();
        $product->title = $productTransfer->getTitle();
        $product->description = $productTransfer->getDescription();
        $product->price = $productTransfer->getPrice();
        $product->sku = $productTransfer->getSku();


        try {
            $isOk = $product->save();
        } catch (\Throwable $e) {
            dd($e);
        }

        return $product;
    }
}
