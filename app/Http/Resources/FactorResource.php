<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FactorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description !== null ? $this->description : '',
            'price' => $this->price,
            'date' => Carbon::create($this->date)->toDateString(),
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'vehicles' => VehicleResource::collection($this->whenLoaded('vehicles')),
            'drivers' => DriverResource::collection($this->whenLoaded('drivers')),
            'user' => new AdminResource($this->whenLoaded('user'))
        ];
    }
}
