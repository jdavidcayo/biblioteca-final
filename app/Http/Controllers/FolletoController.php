<?php

namespace App\Http\Controllers;

use App\Models\Capsula;
use App\Models\Folleto;
use Illuminate\Http\Request;

class FolletoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $folletos= Folleto:: paginate(10);
        return view("folletos.index",compact("folletos"));
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
        $folleto = Folleto::find($id);

        // Verifica si el folleto existe
        if (!$folleto) {
            abort(404);
        }
    
        return view('folletos.index', compact('folleto'));
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