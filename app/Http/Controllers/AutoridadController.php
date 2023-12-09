<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autoridad;

class AutoridadController extends Controller
{
    public function index()
    {
        $autoridades = Autoridad::paginate(20);
        return view('autoridad.admin', compact('autoridades'));
    }

    public function create()
    {
        return view('autoridad.create');
    }

    public function store(Request $request)
    {
        $autoridad = new Autoridad();
        $autoridad->nombre = $request->nombre;
        $autoridad->descripcion = $request->descripcion;
        $autoridad->save();
        return redirect()->route('autoridades.index');
    }

    public function update(Request $request, $id)
    {
        $autoridad = Autoridad::find($id);
        $autoridad->nombre = $request->nombre;
        $autoridad->descripcion = $request->descripcion;
        $autoridad->save();
        return redirect()->route('autoridades.index');
    }

    public function destroy($id)
    {
        $autoridad = Autoridad::find($id);
        $autoridad->delete();
        return redirect()->route('autoridades.index');
    }

    public function edit($id)
    {
        $autoridad = Autoridad::find($id);
        return view('autoridad.edit', compact('autoridad'));
    }
}
