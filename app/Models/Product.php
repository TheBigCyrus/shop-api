<?php

namespace App\Models;

use App\Http\Requests\Product\GslleryStoreRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Brand::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function newProduct(Request $request)
    {

        $imagePath = Carbon::now()->microsecond . '.' .$request->image->extension();
        $request->image->storeAs('image/Products' , $imagePath , 'public');
        $this->create([
            'name' => $request->name ,
            'category_id' => $request->category_id ,
            'brand_id' => $request->brand_id ,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => $imagePath ,
            'price' => $request->price ,
            'quantity' => $request->quantity ,

        ]);

    }

    public function updateProduct(Request $request)
    {

        if ($request->has('image')){
            $imagePath = Carbon::now()->microsecond . '.' .$request->image->extension();
            $request->image->storeAs('image/Products' , $imagePath , 'public');
        };
        $this->update([
            'name' =>  $request->has('name') ? $request->name : $this->name,
            'category_id' => $request->has('category_id') ? $request->category_id : $this->category_id,
            'brand_id' => $request->has('brand_id') ? $request->brand_id : $this->brand_id,
            'slug' =>  $request->has('slug') ? $request->slug : $this->slug,
            'description' =>  $request->has('description') ? $request->description : $this->description,
            'image' => $request->has('image') ? $imagePath : $this->image ,
            'price' =>  $request->has('price') ? $request->price : $this->price,
            'quantity' =>  $request->has('quantity') ? $request->quantity : $this->quantity,

        ]);

    }

    public function newGallery(GslleryStoreRequest $request)
    {
        foreach ($request->path as $image ) {
            $imageGalleryPath = Carbon::now()->microsecond . '.' .$image->extension();
            $image->storeAs('image/Gallery' , $imageGalleryPath , 'public');

            $this->galleries()->create([
                'product_id' => $this->id,
                'path'     => $imageGalleryPath ,
                'mime'       => $image->getClientMimeType()
            ]);
        }
    }
}
