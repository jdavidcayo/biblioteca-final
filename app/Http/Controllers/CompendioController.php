<?php

namespace App\Http\Controllers;

use App\Models\Compendio;
use App\Models\Autoridad;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CompendioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //if ($request->filled('anio')) {
      //  $query->where('anio', $request->anio);
    //}
    public function index(Request $request)
    {
        $compendios = Compendio::where('estado', 1)
            ->orderByDesc('anio')
            ->paginate(20);

        if ($request->has('autoridadId')) {
            $compendios = Compendio::where('autoridadId', $request->autoridadId)->orderByDesc('anio')->paginate(20);
        }
        return view("compendio.index", compact("compendios"));
    }
    public function admin()
    {
        $compendios = Compendio::paginate(20);
        return view('compendio.admin', compact('compendios'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autoridades = Autoridad::all();
        return view('compendio.create', compact('autoridades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $compendio = new Compendio();
        $compendio->titulo = $request->titulo;
        $compendio->descripcion = $request->descripcion;
        $compendio->anio = $request->anio;
        $compendio->estado = $request->estado;
        $compendio->autoridad = $request->autoridad;
        if ($request->area) $compendio->area = $request->area;

        $compendio->autorId = $request->user()->id;

        if ($request->hasFile("urlImagen")) {
            $file = $request->file("urlImagen");

            $name = time() . "-" . $request->file("urlImagen")->getClientOriginalName();
            $name = str_replace(" ", "-", $name);

            $file->storeAs("public/compendios/", $name);

            $imagePath = storage_path("app/public/compendios/" . $name);
            $resizedImage = Image::make($imagePath)->fit(320, 320);
            $resizedImage->save(storage_path("app/public/compendios/" . $name));
            $compendio->urlImagen = "storage/compendios/" . $name;
        } else {
            $compendio->urlImagen = "assets/img/ICONO-Documentos.png";
        }


        if ($request->hasFile("urlDocumento")) {
            $file = $request->file("urlDocumento");

            $name = time() . "-" . $request->file("urlDocumento")->getClientOriginalName();
            $name = str_replace(" ", "-", $name);

            $file->storeAs("public/compendios/", $name);

            $compendio->urlDocumento = "storage/compendios/" . $name;
        }

        $compendio->save();
        return redirect()->route('compendio.admin');
    }


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
        $autoridades = Autoridad::all();
        return view('compendio.edit', compact('compendio', 'autoridades'));
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
