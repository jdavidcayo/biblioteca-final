<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();
        return view('documento.index', compact('documentos'));
    }
}
