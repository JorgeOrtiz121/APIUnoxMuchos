<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    use HasFactory;
    protected $fillable=['NombrePlataforma','Procesador','GPU'];
    public function juego(){
        return $this->hasMany(Juego::class,'plataformas_id');
    }
}
