<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\Crud\CategoryRequest;
use App\Http\Requests\Crud\listingProductsWithAbilityRequest;
use App\Models\Category;
use App\Services\ServiceCategories;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    protected $serviceCategories;

    public function __construct(ServiceCategories $serviceCategories)
    {
        $this->serviceCategories = $serviceCategories;
    }

    public function index()
    {
        $categories = $this->serviceCategories->all();
        return response(['data' => $categories], 200);
    }


    public function store(CategoryRequest $request)
    {
        $category = $this->serviceCategories->create($request->only($this->serviceCategories->getModel()->fillable));
        return response(['data' => $category], 201);
    }

    public function show($id)
    {
        $category = $this->serviceCategories->show($id);
        return response(['data', $category], 200);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->serviceCategories->update($request->only($this->serviceCategories->getModel()->fillable), $id);
        return response(['data' => $category], 200);
    }

    public function destroy($id)
    {
        $this->serviceCategories->delete($id);
        return response(['data' => null], 204);
    }
}
