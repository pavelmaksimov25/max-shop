<?php

declare(strict_types=1);


namespace Modules\Product\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Product\DataTransferObjects\ProductTransfer;

final readonly class SkuGenerator
{
    public function generate(ProductTransfer $productTransfer): string
    {
        return sprintf(
            'sku_%s-%s',
            Str::slug(substr($productTransfer->getTitle(), 0,10)),
            substr(Hash::make($productTransfer->getTitle()), 0,10),
        );
    }
}
