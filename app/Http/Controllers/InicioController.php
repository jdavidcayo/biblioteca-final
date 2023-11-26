<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capsula;

class InicioController extends Controller
{
    public function index()
    {
        $capsulas = Capsula::all();

        return view('inicio', compact('capsulas'));
    }
}
