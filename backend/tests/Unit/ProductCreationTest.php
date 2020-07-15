<?php

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductCreationTest extends TestCase
{
    public function it_creates_at_least_hundred_fake_ProductsCreation()
    {
        $product = [];
        $product[] = factory(Product::class, mt_rand(100, 1000))->create();
        $this->assertTrue(count($product) >= 100);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
