<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   
        dd($this->resource['fName']);
        return [
            'avatar' => $this->resource->has('avatar') ? $this->resource['avatar'] : $this->resource['picture'] ,
            'email' => $this->resource['email'],
            'firstname' => $this->resource->has('firstname') ? $this->resource['firstname'] : $this->resource['fName'],
            'lastname' => $this->resource->has('lastname') ? $this->resource['lastname'] : $this->resource['lName'],
        ];
    }
}
