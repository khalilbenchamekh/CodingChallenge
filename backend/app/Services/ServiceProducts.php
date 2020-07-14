<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 13/07/2020
 * Time: 13:21
 */

namespace App\Services;


use App\Http\Requests\Crud\ProductRequest;
use App\Models\Product;
use App\Repositories\Repositories\CartegorieRepository;
use App\Repositories\Repositories\ProductRepository;

class ServiceProducts
{
    protected $productRepository;
    protected $cartegoryRepository;

    public function __construct(ProductRepository $productRepository, CartegorieRepository $cartegoryRepository)
    {
        $this->cartegoryRepository = $cartegoryRepository;
        $this->productRepository = $productRepository;
    }

    public function all()
    {
        return $this->productRepository->all();
    }

    // create a new record in the database
    public function create(ProductRequest $request)
    {
        $data = $request->only($this->productRepository->getModel()->fillable);
        $products = $this->productRepository->create($data);
        $this->attachHelper($request, $products);
        return $products;
    }

    /**
     * Attach a model to the parent.
     * @param  ProductRequest $request
     * @param Product $products
     * @return void
     */
    private function attachHelper(ProductRequest $request, Product $products)
    {
        if ($request->has('category_id')) {
            $category_id = $request->input('category_id');
            $categories = $this->cartegoryRepository->find($category_id);
            $this->productRepository->attachCategoriesToProduct($categories, $products);
        }
    }

    // update record in the database
    public function update(ProductRequest $request, $id)
    {
        $data = $request->only($this->productRepository->getModel()->fillable);
        $products = $this->productRepository->update($data, $id);
        $this->attachHelper($request, $products);
        return $products;
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->productRepository->show($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->productRepository->getModel();
    }

    // Set the associated model
    public function setModel($model)
    {
        return $this->productRepository->setModel($model);
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->productRepository->with($relations);
    }

    public function listingProductsWithAbility($category_id = null)
    {
        return $this->productRepository->listingProductsWithAbility($category_id);

    }
}
