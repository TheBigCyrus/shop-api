<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Resources\Brandresource;
use App\Http\Resources\CategoryResource;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return CategoryResource::collection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request , Category $Category)
    {
        $Category->newCategory($request);
        $data = $Category->orderBy('id' , 'desc')->first();
        return new CategoryResource($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $Category)
    {
        return new CategoryResource($Category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $Category)
    {
        $Category->updateCategory($request);
        return new CategoryResource($Category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
        return 'ok';
    }

    public function parent(Category $Category)
    {
        return new CategoryResource($Category->load('parent'));
    }
    public function children(Category $Category)
    {
        return new CategoryResource($Category->load('children'));
    }
    public function GetProducts(Category $Category)
    {
        return new CategoryResource($Category->load('products'));
    }

}
