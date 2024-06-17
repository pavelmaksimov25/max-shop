<?php

declare(strict_types=1);


namespace Modules\Product\DataTransferObjects;
use Illuminate\Support\MessageBag;

final class ProductResponseTransfer
{
    private MessageBag $errors;

    public function __construct(private ?ProductTransfer $productTransfer = null)
    {
        $this->errors = new MessageBag();
    }

    public function getProductTransfer(): ProductTransfer
    {
        return $this->productTransfer;
    }

    public function getErrors(): MessageBag
    {
        return $this->errors;
    }

    public function addError(string $key, string $error): void
    {
        $this->errors->add($key, $error);
    }

    public function isOk(): bool
    {
        return $this->errors->isEmpty();
    }
}
