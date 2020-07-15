<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\Crud\listingProductsWithAbilityRequest;
use App\Http\Requests\Crud\ProductRequest;
use App\Services\ServiceProducts;

class ProductController extends Controller
{
    protected $serviceProducts;

    public function __construct(ServiceProducts $serviceProducts)
    {
        $this->serviceProducts = $serviceProducts;
    }

    public function index()
    {
        $products = $this->serviceProducts->all();
        return response(['data' => $products], 200);
    }

    public function store(ProductRequest $request)
    {
        $product = $this->serviceProducts->create($request);

        return response(['data' => $product], 201);

    }

    public function listingProductsWithAbility(listingProductsWithAbilityRequest $request)
    {
        $product = $this->serviceProducts->listingProductsWithAbility($request->only('category_id'));
        return response(['data' => $product], 200);
    }

    public function show($id)
    {
        $product = $this->serviceProducts->show($id);

        return response(['data', $product], 200);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->serviceProducts->update($request, $id);
        return response(['data' => $product], 200);
    }

    public function destroy($id)
    {
        $this->serviceProducts->delete($id);
        return response(['data' => null], 204);
    }
}
