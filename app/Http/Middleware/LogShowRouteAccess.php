<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Lecturas;


class LogShowRouteAccess
{
    public function handle(Request $request, Closure $next)
    {
        $tipos = [ 
            'capsula' => 1,
            'catalogo' => 2,
            'compendio' => 3,
            'folleto' => 4,
            'documento' => 5,
            'formato' => 6,
            'manual' => 7,
        ];
        
        $ruta = $request->route()->getName();
        
        if (strpos($ruta, '.show') !== false) {
        
            $parametrosRuta = $request->route()->parameters();
            
            $archivoId = reset($parametrosRuta);

            $tipoRuta = $this->getTipoRuta($ruta);

            Lecturas::create([
                'usuarioId' => auth()->id(),
                'archivoId' => $archivoId,
                'tipo' => $tipos[$tipoRuta],
            ]);
        }

        return $next($request);
    }


    private function getTipoRuta($ruta)
    {
        $tipoRuta = explode('.', $ruta)[0];

        return $tipoRuta;
    }
}

