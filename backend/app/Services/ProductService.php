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
use App\Repositories\Repositories\CategoryRepository;
use App\Repositories\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function all()
    {
        return $this->productRepository->all();
    }

    // create a new record in the database
    public function create($data, $category_id)
    {
        $products = $this->productRepository->create($data);
        $this->attachHelper($category_id, $products);
        return $products;
    }

    /**
     * Attach a model to the parent.
     * @param $category_id
     * @param Product $products
     * @return void
     */
    private function attachHelper($category_id, Product $products)
    {
        if (!empty($category_id)) {
            $categories = $this->categoryRepository->find($category_id);
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
