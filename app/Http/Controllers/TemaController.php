<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tema;

class TemaController extends Controller
{
    public function index()
    {
        $temas = Tema::paginate(20);
        return view('tema.admin', compact('temas'));
    }

    public function create()
    {
        return view('tema.create');
    }

    public function store(Request $request)
    {
        $tema = new Tema();
        $tema->nombre = $request->nombre;
        $tema->descripcion = $request->descripcion;
        $tema->save();
        return redirect()->route('temas.index');
    }

    public function update(Request $request, $id)
    {
        $tema = Tema::find($id);
        $tema->nombre = $request->nombre;
        $tema->descripcion = $request->descripcion;
        $tema->save();
        return redirect()->route('temas.index');
    }

    public function destroy($id)
    {
        $tema = Tema::find($id);
        $tema->delete();
        return redirect()->route('autoridades.index');
    }

    public function edit($id)
    {
        $tema = Tema::find($id);
        return view('tema.edit', compact('tema'));
    }

}
