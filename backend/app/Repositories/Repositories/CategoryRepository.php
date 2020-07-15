<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 13/07/2020
 * Time: 12:59
 */

namespace App\Repositories\Repositories;


use App\Models\Category;
use App\Repositories\Interfaces\CategoryInterfaces;

class CategoryRepository implements CategoryInterfaces
{
    protected $category;

    // Constructor to bind model to repo
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    // Get all instances of model
    public function all()
    {
        return $this->category->all();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->category->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        return $this->category->findOrFail($id)->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->category->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->category->findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->category;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->category = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->category->with($relations);
    }

    public function find($id_table)
    {
        return $this->category->find($id_table);
    }
}
