<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlataformasUnitariaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'NombrePlataforma'=>$this->NombrePlataforma,
            'Procesador'=>$this->Procesador,
            'GPU'=>$this->GPU,  
        ];
    }
}
