<?php

namespace App\Http\Controllers;

use App\Models\Formato;
use Illuminate\Http\Request;

class FormatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formatos = Formato::paginate(20);
        return view("formato.index", compact("formatos"));
    }

    public function admin()
    {
        $formatos = Formato::paginate(20);
        return view("formato.admin", compact("formatos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("formato.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
