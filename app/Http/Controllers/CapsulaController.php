<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capsula;

class CapsulaController extends Controller
{
    public function index()
    {
        $capsulas = Capsula::all();
        return view('capsula.index', compact('capsulas'));
    }

}
