<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brand\BrandStoreRequest;
use App\Http\Requests\Brand\BrandUpdateRequest;
use App\Http\Resources\Brandresource;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Brandresource::collection(Brand::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandStoreRequest $request , Brand $brand)
    {
        $brand->newBrand($request);
        $data = $brand->orderBy('id' , 'desc')->first();
       return new Brandresource($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $Brand)
    {
        return new Brandresource($Brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandUpdateRequest $request , Brand $Brand)
    {
        $Brand->updateBrand($request);
        return new Brandresource($Brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $Brand)
    {
        $Brand->delete();
        return 'ok';
    }




}
