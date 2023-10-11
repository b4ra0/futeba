<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstadioRequest;
use App\Http\Requests\UpdateEstadioRequest;
use App\Models\Estadio;

class EstadioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estadios = Estadio::all();
        return response()->json($estadios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstadioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Estadio $estadio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estadio $estadio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstadioRequest $request, Estadio $estadio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estadio $estadio)
    {
        //
    }
}
