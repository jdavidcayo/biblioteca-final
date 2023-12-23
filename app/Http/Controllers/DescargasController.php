<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descargas;

class DescargasController extends Controller
{
    public $tipos = [
        'catalogo' => 1,
        'compendio' => 2,
        'documento' => 3,
        'formato' => 4,
        'manual' => 5
    ];

    public function registrarDescarga($tipoDescarga, $archivoId )
    {

        $descarga = new Descargas();

        $descarga->usuarioId = auth()->id();
        $descarga->archivoId = $archivoId;
        $descarga->tipo = $this->tipos[$tipoDescarga];
        $descarga->save();

        return response()->json(['message' => 'Descarga registrada con éxito']);
    }
}
