<?php

namespace App\Http\Controllers;
use App\Models\Compendio;

use Illuminate\Http\Request;

class CompendioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criterios = Compendio::distinct()->pluck('criterio');

        $anios = Compendio::distinct()->pluck('fecha');

        $autoridad = Compendio::distinct()->pluck('autorId');


        $compendios = Compendio::paginate(10);
        return view("compendio.index", compact("compendios", "criterios","fecha","autorId"));
    }
    public function admin(){
        $compendios = Compendio::paginate(10);
        return view('compendio.admin', compact('compendios'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('compendio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $compendios = new Compendio();
    //     $compendios->titulo = $request->titulo;
    //     $compendios->descripcion = $request->descripcion;
    //     $compendios->fecha = $request->fecha;
    //     $compendios->estado = $request->estado;
    //     $compendios->area = $request->area;
    //     $compendios->identificacion = $request->identificacion;
    //     $compendios->descripcion = $request->descripcion;
    //     $compendios->urlDocumento = $request->urlDocumento;
    //     $compendios->autorId = $request->user()->id;

    //     $compendios->save();
    //     return redirect()->route('compendio.index');
    // }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $compendio = Compendio::find($id);
        return view('compendio.edit', compact('compendio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $compendio = Compendio::find($id);
        $compendio->delete();
        return redirect()->route('compendio.admin');
    }
}
