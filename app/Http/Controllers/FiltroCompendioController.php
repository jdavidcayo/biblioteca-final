<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compendio;
use App\Models\Criterio;
use App\Models\Autoridad;

class FiltroCompendioController extends Controller
{

    public function filtrarDatos(Request $request)
    {

        
        $autoridad = $request->input('autoridad', null);
        $anio = $request->input('anio', null);
        $criterio = $request->input('criterio', null);

        
        $query = Compendio::query();

        if ($autoridad !== null) {
            $query->where('autoridad', $autoridad);
        }

        if ($criterio !== null) {
            $query->where('criterio', $criterio);
        }

        if ($anio !== null) {
            $query->where('anio', $anio);
        }

        $compendios = $query->paginate(20);


        $criterios = Criterio::all();
        $autoridades = Autoridad::all();

        return view('compendio.index', compact('compendios', 'autoridades', 'criterios'));
    }
}
