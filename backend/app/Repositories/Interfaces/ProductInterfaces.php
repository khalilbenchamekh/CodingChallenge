<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 13/07/2020
 * Time: 13:06
 */

namespace App\Repositories\Interfaces;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

interface ProductInterfaces extends CrudInterfaces
{
    public function listingProductsWithAbility($category_id = null);

    public function attachCategoriesToProduct($categories,Product $products);


}
