<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 13/07/2020
 * Time: 12:58
 */

namespace App\Services;
use App\Models\Category;
use App\Repositories\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function all()
    {
        return $this->categoryRepository->all();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    public function find(array $id_table)
    {
        return $this->categoryRepository->find($id_table);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        return $this->categoryRepository->update($data, $id);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->categoryRepository->show($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->categoryRepository->getModel();
    }

    // Set the associated model
    public function setModel($model)
    {
        return $this->categoryRepository->setModel($model);
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->categoryRepository->with($relations);
    }

}
