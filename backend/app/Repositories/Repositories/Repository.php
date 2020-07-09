<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 08/07/2020
 * Time: 14:53
 */

namespace App\Repositories\Repositories;


use App\Models\Category;
use App\Repositories\Interfaces\ListingProductInterface;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface, ListingProductInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function all()
    {
        return $this->model->all();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->findOrFail($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model - findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function listingProductsWithAbility($category_id = null)
    {
        $query = $this->with('categories')->has('categories')->orderBy('price', 'asc');
        $query = $category_id == null ? $query
            ->get() : $query->where('category_id', '=', $category_id)->get();
        return $query;
    }
}
