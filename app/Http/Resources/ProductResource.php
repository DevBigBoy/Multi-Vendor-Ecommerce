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
      'id' => $this->id,
      'name' => $this->name,
      'short_description' => $this->short_description,
      'long_description' => $this->long_description,
      'images' => ImageResource::collection($this->whenLoaded('productImages')),
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
    ];
  }
}