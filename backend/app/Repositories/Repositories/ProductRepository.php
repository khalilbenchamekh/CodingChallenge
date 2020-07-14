<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 13/07/2020
 * Time: 13:07
 */

namespace App\Repositories\Repositories;


use App\Models\Product;
use App\Repositories\Interfaces\ProductInterfaces;

class ProductRepository implements ProductInterfaces
{

    protected $product;

    // Constructor to bind model to repo
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    // Get all instances of model
    public function all()
    {
        return $this->product->all();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->product->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        return $this->product->findOrFail($id)->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->product->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->product->findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->product;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->product = $model;
        return $this;
    }

    /**
     * Begin querying a model with eager loading.
     *
     * @param  array|string $relations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function with($relations)
    {
        return $this->product->with($relations);
    }

    public function listingProductsWithAbility($category_id = null)
    {

        $query = $this->with([
                'categories' => function ($query) use ($category_id) {
                    return $query->where('category_id', '=', $category_id);
                }
            ]
        )->has('categories')->orderBy('price', 'asc');
        return $query->get();
    }

//    private function category_id_is_not_null($query)
//    {
//        foreach ($query->categories as $category) {
//            if (isset($category->pivot)) {
//                $pivot = $category->pivot;
//                if (isset($pivot->category_id)) {
//                    $category_id =
//
//                }
//
//            }
//
//        }
//    }

    public
    function attachCategoriesToProduct($categories, Product $products)
    {
        $products->categories()->attach($categories);
    }
}
