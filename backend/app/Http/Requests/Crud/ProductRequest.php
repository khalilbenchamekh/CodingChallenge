<?php


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
            'category_id' => ['exists:categories,id'],
//            '*.image.*' => 'mimes:jpeg,png,gif,svg,doc,pdf,docx,zip',
//            'image.*' => 'mimes:jpeg,png,gif,svg,doc,pdf,docx,zip',
        ];
    }
}
