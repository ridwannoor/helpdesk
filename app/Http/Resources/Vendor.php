<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Vendor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       

       return [
            'id' => $this->id, 
            'badanusaha_id' => $this->badanusaha_id,
            'namaperusahaan'=> $this->namaperusahaan, 
            'alamat'=> $this->alamat, 
            'product'=> $this->product, 
            'jenisusaha_id'=> $this->jenisusaha_id, 
            'category_id'=> $this->category_id, 
            'lokasi_id'=> $this->lokasi_id, 
            'email'=> $this->email, 
            'contactperson'=> $this->contactperson,     
            'notelp'=> $this->notelp,
            'handphone'=> $this->handphone,
            'alternative_person'=> $this->alternative_person,
            'alternative_phone'=> $this->alternative_phone,
            'website'=> $this->website,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d'),
        ];
    }
}
