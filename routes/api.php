<?php

use App\Http\Controllers\Juegos\JuegosController;
use App\Http\Controllers\Plataforma\PlataformaController;
use App\Http\Resources\JuegosResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/verdatos',[JuegosController::class,'index'])->name('juegos.index');
Route::post('/verdatos/crear',[JuegosController::class,'store'])->name('juegos.store');
Route::get('/verdatos/ver/{juegos}',[JuegosController::class,'show'])->name('juegos.show');
Route::post('/verdatos/actualizar/{juegos}',[JuegosController::class,'update'])->name('juegos.update');
Route::get('/verdatos/destruir/{juegos}',[JuegosController::class,'destroy'])->name('juegos.destroy');

Route::get('/verplataforma',[PlataformaController::class,'index'])->name('plataforma.index');
Route::post('/verplataforma/crear',[PlataformaController::class,'store'])->name('plataforma.store');
Route::get('/verplataforma/ver/{plataforma}',[PlataformaController::class,'show'])->name('plataforma.show');
Route::post('/verplataforma/actualizar/{plataforma}',[PlataformaController::class,'update'])->name('plataforma.update');
Route::get('/verplataforma/destruir/{plataforma}',[PlataformaController::class,'destroy'])->name('plataforma.destroy');

Route::get('/verdatosjeje',[JuegosController::class,'relacion'])->name('relacion');
Route::get('/verdatos/años/{juegos}',[JuegosController::class,'examinar'])->name('exam');
