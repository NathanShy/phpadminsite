<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   

        return[
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
            'date' => $this->date,
        ];
    }
}