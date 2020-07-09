<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 08/07/2020
 * Time: 17:40
 */

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCreationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }
}

