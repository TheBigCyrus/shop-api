<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id ,

            'path' =>url('http://127.0.0.1:4400/storage/image/Gallery/'. $this->path)  ,

            'mime' => $this->mime

        ];
    }
}
