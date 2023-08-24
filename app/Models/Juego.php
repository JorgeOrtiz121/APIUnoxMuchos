<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;
    protected $fillable=['NombreJuego','descripcion','año','plataformas_id'];

    public function plataformas(){
        return $this->belongsTo(Plataforma::class);
    }
}
