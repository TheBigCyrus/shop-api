<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name ,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'description' => $this->description,
            'image' => url('http://127.0.0.1:4400/storage/image/Products/'.$this->image)  ,
            'price' => $this->price ,
            'quantity' => $this->quantity ,
            'galleries' => GalleryResource::collection($this->galleries )
        ];
    }
}
