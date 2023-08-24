<?php

namespace App\Http\Controllers\Plataforma;

use App\Http\Controllers\Controller;
use App\Http\Resources\JuegosResource;
use App\Http\Resources\PlataformaResource;
use App\Models\Plataforma;
use Illuminate\Http\Request;

class PlataformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plataformas = Plataforma::with('juego')->get();
       // dd($plataformas);
    return $this->sendResponse(message: 'te envio lo requerido', resultado: [
        "plataformas" => PlataformaResource::collection($plataformas),
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
            "NombrePlataforma" => ['required', 'string', 'min:10', 'max:99'],
            "Procesador" => ['required', 'string', 'min:10', 'max:99'],
            "GPU" => ['required', 'string', 'min:10', 'max:99'],
            
        ]);
        Plataforma::create([
            "NombrePlataforma" => $request->NombrePlataforma,
            "Procesador" => $request->Procesador,
            "GPU" => $request->GPU,
        ]);
        return $this->sendResponse(message: 'Listo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plataforma $plataforma)
    {
        //
        
        return $this->sendResponse(message: 'listo', resultado: [
            'plataforma' => new PlataformaResource($plataforma)
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
    public function update(Request $request, $plataforma)
    {
        //
        $plataformaver = Plataforma::find($plataforma);
        $request->validate([
            "NombrePlataforma" => ['required', 'string', 'min:10', 'max:99'],
            "Procesador" => ['required', 'string', 'min:10', 'max:99'],
            "GPU" => ['required', 'string', 'min:10', 'max:99']
        ]);
        $plataformaver->update([
            "NombrePlataforma" => $request->NombrePlataforma,
            "Procesador" => $request->Procesador,
            "GPU" => $request->GPU
        ]);
        return $this->sendResponse(message: 'Listo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plataforma $plataforma)
    {
        //
        $plataforma->delete();
        return $this->sendResponse(message: 'Listo Borrado');
    }

    
}
