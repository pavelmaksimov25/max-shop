<?php

declare(strict_types=1);

namespace Modules\Product\DataTransferObjects;

use Modules\Product\Http\Requests\ProductStoreRequest;
use Modules\Product\Models\Product;

final class ProductTransfer
{
    public function __construct(
        private string $title,
        private float $price,
        private string $description = '',
        private string $sku = ''
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public static function fromRequest(ProductStoreRequest $request): self
    {
        try {
            return new self(
                title: $request->get('title'),
                price: $request->float('price'),
                description: $request->get('description', '')
            );
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

    }

    public static function fromModel(Product $product): self
    {
        return new self(
            title: $product->title,
            price: $product->price,
            description: $product->description,
            sku: $product->sku
        );
    }
}
