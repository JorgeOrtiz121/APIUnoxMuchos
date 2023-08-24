<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JuegosResource extends JsonResource
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
            'id'=>$this->id,
            'NombreJuegos'=>$this->NombreJuego,
            'descripcion'=>$this->descripcion,
            'año'=>$this->año,
            'plataforma'=>new PlataformasUnitariaResource($this->whenLoaded('plataformas'))

        ];
    }
}
