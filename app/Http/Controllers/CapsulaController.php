<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capsula;
use App\Models\Usuario;

class CapsulaController extends Controller
{

    public function index()
    {
        $capsulas = Capsula::all();
        return view('capsula.index', compact('capsulas'));
    }

    public function admin(){
        $capsulas = Capsula::all();
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
        $capsula->tema = $request->tema;
        $capsula->descripcion = $request->descripcion;
        $capsula->url = $request->url;
        $capsula->autorId = $request->user()->id;
        $capsula->save();
        return redirect()->route('capsula.admin');
    }

    public function update(Request $request, $id)
    {
        $capsula = Capsula::find($id);
        $capsula->titulo = $request->titulo;
        $capsula->tema = $request->tema;
        $capsula->descripcion = $request->descripcion;
        $capsula->url = $request->url;
        $capsula->autorId = $request->user()->id;
        $capsula->save();
        return redirect()->route('capsula.admin');
    }
}
