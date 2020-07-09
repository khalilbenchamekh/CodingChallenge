<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\Crud\listingProductsWithAbilityRequest;
use App\Models\Product;
use App\Repositories\Repositories\Repository;
use ProductRequest;

class ProductController extends Controller
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = new Repository($product);
    }

    public function index()
    {
        $products = $this->model->all();
        return response(['data' => $products], 200);
    }

    public function store(ProductRequest $request)
    {
        $product = $this->model->create($request->only($this->model->getModel()->fillable));

        return response(['data' => $product], 201);

    }
    public function listingProductsWithAbility(listingProductsWithAbilityRequest $request)
    {
        $category_id = $request->input('category_id');
        $prod = $this->model->listingProductsWithAbility($category_id);
        return response(['data' => $prod], 200);
    }
    public function show($id)
    {
        $product = $this->model->show($id);

        return response(['data', $product], 200);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->model->update($request->only($this->model->getModel()->fillable), $id);
        return response(['data' => $product], 200);
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        return response(['data' => null], 204);
    }
}
