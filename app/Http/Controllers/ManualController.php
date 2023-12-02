<?php

namespace App\Http\Controllers;
use App\Models\Manual;
use Illuminate\Http\Request;

class ManualController extends Controller
{

    public function index()
    {
        $manuales = Manual::paginate(10);
        return view("manual.index", compact("manuales"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $manual = Manual::find($id);

        // Verifica si el manual existe
        if (!$manual) {
            abort(404); // Retorna un error 404 si el manual no se encuentra
        }
    
        return view('manual.show', compact('manual'));
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
