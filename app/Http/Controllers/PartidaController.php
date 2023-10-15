<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartidaRequest;
use App\Http\Requests\UpdatePartidaRequest;
use App\Models\Partida;

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
        $dados = $request->validate(
            [
                'temporada_id' => 'required|integer|exists:temporadas,id',
                'time_visitante_id' => 'required|integer|exists:times,id',
                'time_mandante_id' => 'required|integer|exists:times,id',
                'estadio_id' => 'required|integer|exists:estadios,id',
                'arbitro_id' => 'required|integer|exists:arbitros,id',
                'gols_mandante' => 'required|integer',
                'gols_visitante' => 'required|integer',
            ]
        );

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
        $dados = $request->validate(
            [
                'temporada_id' => 'integer|exists:temporadas,id',
                'time_visitante_id' => 'integer|exists:times,id',
                'time_mandante_id' => 'integer|exists:times,id',
                'estadio_id' => 'integer|exists:estadios,id',
                'arbitro_id' => 'integer|exists:arbitros,id',
                'gols_mandante' => 'integer',
                'gols_visitante' => 'integer',
            ]
        );
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
