<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

it('can create product', function () {
    // Arrange
    $product = [
        'title' => fake()->sentence,
        'description' => fake()->paragraph(),
        'price' => fake()->randomFloat(2, 1, 100),
    ];

    // Act
    $response = $this->post(route('product.store'), $product);

    // Assert
    expect($response->getStatusCode())->toBe(Response::HTTP_FOUND);
    $this->assertDatabaseHas('products', $product);
});
