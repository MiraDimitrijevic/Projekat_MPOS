<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceFavDoc extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='favDoc';
    public function toArray($request)
    {
        return [
            'doctor_id'=>$this->resource->doctor_id,
            'doctorDetails'=> new ResourceDoctors($this->resource->doctor),
            

           
        ];     }
}
