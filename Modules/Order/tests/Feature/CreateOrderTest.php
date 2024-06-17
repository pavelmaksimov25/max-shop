<?php

use Symfony\Component\HttpFoundation\Response;

uses(Tests\TestCase::class);

it('sees order.store method reachable', function () {
    $this->post(route('order.store'))->assertStatus(Response::HTTP_FOUND);
});

it('can post an order', function () {
    // Arrange
    $sku = '123456'; // todo :: add product to database
    $order = [
        'sku' => $sku,
        'quantity' => 1,
    ];

    // Act
    $response = $this->post(route('order.store'), $order);

    // Assert
    expect($response->getStatusCode())->toBe(Response::HTTP_FOUND);
    $this->assertDatabaseHas('orders', $order);
});
