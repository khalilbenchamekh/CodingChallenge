<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 13/07/2020
 * Time: 13:01
 */

namespace App\Repositories\Interfaces;


interface CategorieInterfaces extends CrudInterfaces
{
    public function find(array $id_table);


}
