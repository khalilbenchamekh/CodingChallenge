<?php

namespace App\Http\Requests\Crud;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
            'category_id' => 'required|array',
            'category_id.*' => 'integer',
            'image' => ['required', 'string', 'max:255'],
        ];
    }
}
