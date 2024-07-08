<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('read-product')){
            return response()->json('not permission');
        }

       return ProductResource::collection(Product::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request , Product $Product)
    {
        $Product->newProduct($request);
        $data = $Product->orderBy('id', 'desc')->first();
        return new ProductResource($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $Product)
    {
        return new ProductResource($Product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $Product)
    {
        $Product->updateProduct($request);
        return new ProductResource($Product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        $Product->delete();
        return 'ok';
    }
}
