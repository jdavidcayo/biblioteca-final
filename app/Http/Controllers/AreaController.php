<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::paginate(20);
        return view('area.admin', compact('areas'));
    }

    public function create()
    {
        return view('area.create');
    }

    public function store(Request $request)
    {
        $area = new area();
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->save();
        return redirect()->route('areas.index');
    }

    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->save();
        return redirect()->route('areas.index');
    }

    public function destroy($id)
    {
        $area = area::find($id);
        $area->delete();
        return redirect()->route('areas.index');
    }

    public function edit($id)
    {
        $area = Area::find($id);
        return view('area.edit', compact('area'));
    }

}
