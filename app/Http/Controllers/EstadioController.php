<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstadioRequest;
use App\Http\Requests\UpdateEstadioRequest;
use App\Models\Estadio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $dados = $request->validated();

        $estadio = Estadio::create($dados);

        return response()->json($estadio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estadio = Estadio::with(['pais', 'clubes'])->find($id);
        return response()->json($estadio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateEstadioRequest $request)
    {
        $dados = $request->validated();

        $estadio = Estadio::find($id);
        $estadio->update($dados);

        return response()->json($estadio);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Estadio::destroy($id);
        return response()->json(['msg' => 'Estádio deletado com sucesso']);
    }
}
