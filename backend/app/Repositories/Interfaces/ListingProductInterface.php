<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 08/07/2020
 * Time: 15:52
 */

namespace App\Repositories\Interfaces;


interface ListingProductInterface
{

    public function listingProductsWithAbility($category_id = null);

}
