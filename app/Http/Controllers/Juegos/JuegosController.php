<?php

namespace App\Http\Controllers\Juegos;

use App\Http\Controllers\Controller;
use App\Http\Resources\JuegosResource;
use App\Models\Juego;
use Illuminate\Http\Request;

class JuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $juegos = Juego::with('plataformas')->get();


        return $this->sendResponse(message: 'Te envio lo que me pides', resultado: [
            'juegos' => JuegosResource::collection($juegos),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'NombreJuego' => ['required', 'string', 'min:10', 'max:99'],
            'descripcion' => ['required', 'string', 'min:10', 'max:99'],
            'año' => ['required', 'numeric'],
            'juegos_id' => ['required', 'numeric']

        ]);
        Juego::create([
            'NombreJuego' => $request->NombreJuego,
            'descripcion' => $request->descripcion,
            'año' => $request->año,
            'juegos_id' => $request->juegos_id

        ]);
        return $this->sendResponse(message: 'Ya lo hice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Juego $juegos)
    {
        //
        $juegos->load('plataformas')->get();

        return $this->sendResponse(message: 'Listo', resultado: [
            'juegos' => new JuegosResource($juegos),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juego $juegos)
    {
        //
        $request->validate([
            'NombreJuego' => ['required', 'string', 'min:10', 'max:99'],
            'descripcion' => ['required', 'string', 'min:10', 'max:99'],
            'año' => ['required', 'numeric']
        ]);

        $juegos->update([
            'NombreJuego' => $request->NombreJuego,
            'descripcion' => $request->descripcion,
            'año' => $request->año
        ]);
        return $this->sendResponse(message: 'Listo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juego $juegos)
    {
        //
        $juegos->delete();
        return $this->sendResponse(message: 'Borrado');
    }

    public function examinar($juegos)
    {

        $juegos = Juego::where('año','=', $juegos)->with('plataformas')->get();
        if (!$juegos->isEmpty()) {
            return $this->sendResponse(message: 'listo', resultado: [
                'juegos' => JuegosResource::collection($juegos),
            ]);
        }else{
            return $this->sendResponse(message:'no hay nada');
        }
    }
}
