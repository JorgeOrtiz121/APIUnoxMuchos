<?php

namespace App\Http\Resources;

use App\Models\Juegos;
use Illuminate\Http\Resources\Json\JsonResource;

class PlataformaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'NombrePlataforma'=>$this->NombrePlataforma,
            'Procesador'=>$this->Procesador,
            'GPU'=>$this->GPU,
            'juegos' => JuegosResource::collection($this->juego)

        ];
    }
}
