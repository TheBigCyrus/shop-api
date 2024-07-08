<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Brand extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class , 'brand_id');
    }


    public function newBrand(Request $request)
    {

        $imagePath = Carbon::now()->microsecond . '.' .$request->image->extension();
        $request->image->storeAs('image/brands' , $imagePath , 'public');
        $this->create([
            'title' => $request->title ,
            'image' => $imagePath
        ]);
    }

    public function updateBrand(Request $request): void
    {

        if ($request->has('image')){
            $imagePath = Carbon::now()->microsecond . '.' .$request->image->extension();
            $request->image->storeAs('image/brands' , $imagePath , 'public');
        };
        $this->update([
            'title' => $request->title ,
            'image' => $request->has('image') ? $imagePath : $this->image
        ]);


    }
}
