<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 08/07/2020
 * Time: 14:48
 */

namespace App\Repositories\Interfaces;


interface  RepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);


}
