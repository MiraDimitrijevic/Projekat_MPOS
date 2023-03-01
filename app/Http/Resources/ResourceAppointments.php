<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceAppointments extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='appointment';

    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
             'date'=>$this->resource->date,
             'time'=>$this->resource->time,
             'status'=>$this->resource->status,
            'doctor'=> new ResourceDoctors($this->resource->doctor),


        ]; 
          }
}
