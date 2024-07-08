<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Category::class , 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Category::class , 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class , 'category_id');
    }

    public function newCategory(Request $request)
    {
        $this->create([
            'title' => $request->title ,
            'parent_id' => $request->parent_id
        ]);
    }

    public function updateCategory(Request $request)
    {

        $this->update([
            'title' => $request->has('title') ? $request->title : $this->title ,
            'parent_id' => $request->has('parent_id') ? $request->parent_id : $this->parent_id
        ]);


    }
}
