<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 08/07/2020
 * Time: 16:13
 */

namespace App\Http\Requests\Crud;


use Illuminate\Foundation\Http\FormRequest;

class listingProductsWithAbilityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => ['exists:categories,id'],
        ];
    }
}
