<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lecturas;
use App\Models\Descargas;
use App\Models\Formato;
use App\Models\Documento;
use App\Models\Catalogo;
use App\Models\Compendio;
use App\Models\Manual;
use App\Models\User;

class EstadisticaController extends Controller
{
    public function obtenerEstadistica(Request $request, $filtro)
    {
        $tipoFiltro = [
            'GENERAL' => 1,
            'USUARIO' => 2,
            'CATEGORIA' => 3
        ];

        $tiposDescarga = [
            'catalogo' => 1,
            'compendio' => 2,
            'documento' => 3,
            'formato' => 4,
            'manual' => 5
        ];

        $tiposLectura = [
            'capsula' => 1,
            'catalogo' => 2,
            'compendio' => 3,
            'folleto' => 4,
            'documento' => 5,
            'formato' => 6,
            'manual' => 7,
        ];


        if ($filtro == $tipoFiltro['GENERAL']) {
            return $this->obtenerEstadisticaGeneral($tiposDescarga, $tiposLectura);
        }
        if ($filtro == $tipoFiltro['USUARIO']) {
            return $this->obtenerEstadisticaUsuario($request);
        }
    }

    public function buscarUsuario(Request $request)
    {
        $tiposDescarga = [
            'catalogos' => 1,
            'compendios' => 2,
            'documentos' => 3,
            'formatos' => 4,
            'manuals' => 5
        ];

        $correoElectronico = $request->input('correo');
    
        $usuarioEncontrado = User::where('email', $correoElectronico)->first();

        if ($usuarioEncontrado) {
        $usuarioId = $usuarioEncontrado->id;

        
        $descargasUsuario = Descargas::where('usuarioId', $usuarioId)
            ->select('archivoId', 'tipo')
            ->orderByDesc('created_at')
            ->get();

        $nombresArchivos = [];

        foreach ($descargasUsuario as $descarga) {
            $tipoDescarga = array_search($descarga->tipo, $tiposDescarga);

            
            switch ($tipoDescarga) {
                case 'documentos':
                    $nombreArchivo = Documento::where('id', $descarga->archivoId)->value('nombreArchivo');
                    break;
                
                case 'catalogos':
                    $nombreArchivo = Catalogo::where('id', $descarga->archivoId)->value('nombreArchivo');
                    break;

                case 'compendios':
                    $nombreArchivo = Compendio::where('id', $descarga->archivoId)->value('nombreArchivo');
                    break;
            
                case 'formatos':
                    $nombreArchivo = Formato::where('id', $descarga->archivoId)->value('nombreArchivo');
                    break;

                case 'manuals':
                    $nombreArchivo = Manual::where('id', $descarga->archivoId)->value('nombreArchivo');
                    break;
                
                default:
                    $nombreArchivo = 'Tipo no manejado';
                    break;
            }

            $nombresArchivos[] = $nombreArchivo;
        }

        return view("admin.buscar-usuario", compact('usuarioEncontrado', 'descargasUsuario', 'nombresArchivos'));
        
    } else {

        return view("admin.buscar-usuario", [
            'usuarioEncontrado' => null,
            'descargasUsuario' => null,
            'nombresArchivos' => null
        ]);
    }
}



    private function obtenerEstadisticaGeneral($tiposDescarga, $tiposLectura)
    {
        $response = [];


        $response['descargas'] = [
            'catalogo' => Descargas::where('tipo', $tiposDescarga['catalogo'])->count(),
            'compendio' => Descargas::where('tipo', $tiposDescarga['compendio'])->count(),
            'documento' => Descargas::where('tipo', $tiposDescarga['documento'])->count(),
            'formato' => Descargas::where('tipo', $tiposDescarga['formato'])->count(),
            'manual' => Descargas::where('tipo', $tiposDescarga['manual'])->count(),
        ];

        $response['lecturas'] = [
            'capsula' => Lecturas::where('tipo', $tiposLectura['capsula'])->count(),
            'catalogo' => Lecturas::where('tipo', $tiposLectura['catalogo'])->count(),
            'compendio' => Lecturas::where('tipo', $tiposLectura['compendio'])->count(),
            'documento' => Lecturas::where('tipo', $tiposLectura['documento'])->count(),
            'formato' => Lecturas::where('tipo', $tiposLectura['formato'])->count(),
            'manual' => Lecturas::where('tipo', $tiposLectura['manual'])->count(),
        ];

        return response()->json($response);
    }

    private function obtenerEstadisticaUsuario(Request $request)
    {
        $response = [];

        $response['usuarioDescargas'] = Descargas::select('users.id as usuarioId', 'users.name as usuarioNombre', DB::raw('COUNT(*) as totalDescargas'))
            ->join('users', 'descargas.usuarioId', '=', 'users.id')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('totalDescargas')
            ->take(10)
            ->get();

        $response['usuarioLecturas'] = Lecturas::select('users.id as usuarioId', 'users.name as usuarioNombre', DB::raw('COUNT(*) as totalLecturas'))
            ->join('users', 'lecturas.usuarioId', '=', 'users.id')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('totalLecturas')
            ->take(10)
            ->get();

        return response()->json($response);
    }
}
