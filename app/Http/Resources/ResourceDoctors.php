<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceDoctors extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='doctors';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'category'=>$this->resource->category,
            'experience'=>$this->resource->experience,
            'biography'=>$this->resource->biography,
            'email'=>$this->resource->email,
            'photo'=>$this->resource->photo,
        ];
    }
}
