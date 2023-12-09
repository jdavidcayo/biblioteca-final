<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::paginate(10);
        return view('documento.index', compact('documentos'));
    }

    public function admin()
    {
        $documentos = Documento::paginate(20);
        return view('documento.admin', compact('documentos'));
    }

    public function create()
    {
        return view('documento.create');
    }

    public function store(Request $request)
    {
        $documento = new Documento();
        $documento->titulo = $request->titulo;
        $documento->descripcion = $request->descripcion;
        $documento->fecha = $request->fecha;
        $documento->estado = $request->estado;
        $documento->autorId = $request->user()->id;
        
        if ($request->hasFile("urlImagen")) {
            $file = $request->file("urlImagen");

            $name = time() . "-" . $request->file("urlImagen")->getClientOriginalName();
            $name = str_replace(" ", "-", $name);
            
            $file->storeAs("public/documentos/" , $name);
    
        $imagePath = storage_path("app/public/documentos/" .$name);
        $resizedImage = Image::make($imagePath)->fit(320, 320);
        $resizedImage->save(storage_path("app/public/documentos/" . $name));        
        $documento->urlImagen = "storage/documentos/" . $name;

        }
        
        else{
            $documento->urlImagen = "assets/img/ICONO-Documentos.png";
        }

        if ($request->hasFile("urlDocumento")) {
            $file = $request->file("urlDocumento");

            $name = time() . "-" . $request->file("urlDocumento")->getClientOriginalName();
            $name = str_replace(" ", "-", $name);
            
            $file->storeAs("public/documentos/" , $name);
    
        $documento->urlDocumento = "storage/documentos/" . $name;

        }

        $documento->save();
        return redirect()->route('documento.admin');
    }

    public function update(Request $request, $id)
    {
        $documento = Documento::findOrFail($id);
        $documento->titulo = $request->titulo;
        $documento->descripcion = $request->descripcion;
        $documento->fecha = $request->fecha;
        $documento->estado = $request->estado;
        $documento->url = $request->url;
        $documento->autorId = $request->user()->id;
        
        if ($request->hasFile("urlImagen")) {
            $file = $request->file("urlImagen");

            $name = time() . "-" . $request->file("urlImagen")->getClientOriginalName();
            $name = str_replace(" ", "-", $name);
            
            $file->storeAs("public/documentos/" , $name);
    
        $imagePath = storage_path("app/public/documentos/" .$name);
        $resizedImage = Image::make($imagePath)->fit(320, 320);
        $resizedImage->save(storage_path("app/public/documentos/" . $name));        
        $documento->urlImagen = "storage/documentos/" . $name;

        }
        
        else{
            $documento->urlImagen = "assets/img/ICONO-Documentos.png";
        }

        if ($request->hasFile("urlDocumento")) {
            $file = $request->file("urlDocumento");

            $name = time() . "-" . $request->file("urlDocumento")->getClientOriginalName();
            $name = str_replace(" ", "-", $name);
            
            $file->storeAs("public/documentos/" , $name);
    
        $documento->urlDocumento = "storage/documentos/" . $name;

        }

        $documento->save();
        return redirect()->route('documento.admin');
    }
}
