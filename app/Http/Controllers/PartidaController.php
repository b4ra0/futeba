<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartidaRequest;
use App\Http\Requests\UpdatePartidaRequest;
use App\Models\Partida;
use Illuminate\Support\Facades\Log;

class PartidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partidas = Partida::all();
        return response()->json($partidas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartidaRequest $request)
    {
        $dados = $request->validated();

        $partida = Partida::create($dados);

        return response()->json($partida, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $partida = Partida::find($id);
        return response()->json($partida);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdatePartidaRequest $request)
    {
        $dados = $request->validated();
        $partida = Partida::find($id);
        $partida->update($dados);

        return response()->json($partida);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Partida::destroy($id);
        return response()->json(['msg' => 'Estádio deletado com sucesso']);
    }
}
