<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\GslleryStoreRequest;
use App\Http\Resources\GalleryResource;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $Product)
    {
      return  GalleryResource::collection($Product->galleries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GslleryStoreRequest $request , Product $Product)
    {
        $Product->newGallery($request);
        return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $Gallery)
    {
        unlink(public_path('storage/image/Gallery/'.$Gallery->path));
        $Gallery->delete();
        return 'ok';
    }
}
