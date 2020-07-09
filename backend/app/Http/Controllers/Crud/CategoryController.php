<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\Crud\CategoryRequest;
use App\Http\Requests\Crud\listingProductsWithAbilityRequest;
use App\Models\Category;
use App\Repositories\Repositories\Repository;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    protected $model;

    public function __construct(Category $category)
    {
        $this->model = new Repository($category);
    }

    public function index()
    {
        $categories = $this->model->all();
        return response(['data' => $categories], 200);
    }



    public function store(CategoryRequest $request)
    {
        $category = $this->model->create($request->only($this->model->getModel()->fillable));
        return response(['data' => $category], 201);
    }

    public function show($id)
    {
        $category = $this->model->show($id);
        return response(['data', $category], 200);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->model->update($request->only($this->model->getModel()->fillable), $id);
        return response(['data' => $category], 200);
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        return response(['data' => null], 204);
    }
}
