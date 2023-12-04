<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Capsula;
use App\Models\Usuario;


class CapsulaController extends Controller
{

    public function index()
    {
        $capsulas = Capsula::paginate(20);
        return view('capsula.index', compact('capsulas'));
    }

    public function admin(){
        $capsulas = Capsula::paginate(20);
        return view('capsula.admin', compact('capsulas'));
    }

    public function create()
    {
        return view('capsula.create');
    }

    public function show($id)
    {
        $capsula = Capsula::find($id);
        return view('capsula.show', compact('capsula'));
    }

    public function edit($id)
    {
        $capsula = Capsula::find($id);
        return view('capsula.edit', compact('capsula'));
    }

    public function destroy($id)
    {
        $capsula = Capsula::find($id);
        $capsula->delete();
        return redirect()->route('capsula.admin');
    }

    public function store(Request $request)
    {
        $capsula = new Capsula();
        $capsula->titulo = $request->titulo;
        $capsula->descripcion = $request->descripcion;
        $capsula->fecha = $request->fecha;
        $capsula->estado = $request->estado;
        $capsula->url = $request->url;
        $capsula->autorId = $request->user()->id;
        
        if ($request->hasFile("urlImagen")) {
            $file = $request->file("urlImagen");

            $name = time() . "-" . $request->file("urlImagen")->getClientOriginalName();
            $name = str_replace(" ", "-", $name);
            
            $file->storeAs("public/capsulas/" , $name);
    
        $imagePath = storage_path("app/public/capsulas/" .$name);
        $resizedImage = Image::make($imagePath)->fit(320, 320);
        $resizedImage->save(storage_path("app/public/capsulas/" . $name));        
        $capsula->urlImagen = "storage/capsulas/" . $name;

        }
        
        else{
            $capsula->urlImagen = "assets/img/camera-video.svg";
        }

        $capsula->save();
        return redirect()->route('capsula.admin');
    }
    

    public function update(Request $request, $id)
    {
        request()->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'url' => 'required',
        ]);

        request()->validate([
            'urlImagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $capsula = Capsula::find($id);
        $capsula->titulo = $request->titulo;
        $capsula->descripcion = $request->descripcion;
        $capsula->url = $request->url;
        $capsula->fecha = $request->fecha;
        $capsula->estado = $request->estado;
        
        if ($request->hasFile("urlImagen")) {
            $file = $request->file("urlImagen");

            $name = time() . "-" . $request->file("urlImagen")->getClientOriginalName();
            $name = str_replace(" ", "-", $name);
            
            $file->storeAs("public/capsulas/" , $name);
    
            $imagePath = storage_path("app/public/capsulas/" .$name);
            $resizedImage = Image::make($imagePath)->fit(320, 320);
            $resizedImage->save(storage_path("app/public/capsulas/" . $name));        
            
            $capsula->urlImagen = "storage/capsulas/" . $name;
        }

        $capsula->save();
        return redirect()->route('capsula.admin');
    }
}
