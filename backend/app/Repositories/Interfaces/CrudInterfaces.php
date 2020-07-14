<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 13/07/2020
 * Time: 18:01
 */

namespace App\Repositories\Interfaces;

interface  CrudInterfaces
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);

    public function getModel();

    public function with(string $relations);

    public function setModel(Model $model);
}
