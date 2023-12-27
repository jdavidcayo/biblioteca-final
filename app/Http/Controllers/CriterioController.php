<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criterio;

class CriterioController extends Controller
{
    public function index()
    {
        $criterios = Criterio::orderByDesc('created_at')
            ->paginate(20);
        return view('criterio.admin', compact('criterios'));
    }

    public function create()
    {
        return view('criterio.create');
    }

    public function store(Request $request)
    {
        $criterio = new Criterio();
        $criterio->nombre = $request->nombre;
        $criterio->descripcion = $request->descripcion;
        $criterio->save();
        return redirect()->route('criterio.index');
    }

    public function update(Request $request, $id)
    {
        $criterio = Criterio::find($id);
        $criterio->nombre = $request->nombre;
        $criterio->descripcion = $request->descripcion;
        $criterio->save();
        return redirect()->route('criterio.index');
    }

    public function destroy($id)
    {
        $criterio = Criterio::find($id);
        $criterio->delete();
        return redirect()->route('criterio.index');
    }

    public function edit($id)
    {
        $criterio = Criterio::find($id);
        return view('criterio.edit', compact('criterio'));
    }
}
