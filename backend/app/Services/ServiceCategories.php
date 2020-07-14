<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 13/07/2020
 * Time: 12:58
 */

namespace App\Services;
use App\Models\Category;
use App\Repositories\Repositories\CartegorieRepository;

class ServiceCategories
{
    protected $cartegorieRepository;

    public function __construct(CartegorieRepository $cartegorieRepository)
    {
        $this->cartegorieRepository = $cartegorieRepository;
    }

    public function all()
    {
        return $this->cartegorieRepository->all();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->cartegorieRepository->create($data);
    }

    public function find(array $id_table)
    {
        return $this->cartegorieRepository->find($id_table);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        return $this->cartegorieRepository->update($data, $id);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->cartegorieRepository->delete($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->cartegorieRepository->show($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->cartegorieRepository->getModel();
    }

    // Set the associated model
    public function setModel($model)
    {
        return $this->cartegorieRepository->setModel($model);
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->cartegorieRepository->with($relations);
    }

}
