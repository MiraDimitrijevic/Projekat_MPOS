<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceUser extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='user';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'email'=>$this->resource->email,
            'type'=>$this->resource->type,
            'profile_photo_path'=>$this->resource->profile_photo_path,
            'biography'=>$this->resource->biography,
            'status'=>$this->resource->status,


        ]; 
    }
}
