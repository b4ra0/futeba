<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampeonatoRequest;
use App\Http\Requests\UpdateCampeonatoRequest;
use App\Models\Campeonato;

class CampeonatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campeonatos = Campeonato::all();
        return response()->json($campeonatos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCampeonatoRequest $request)
    {
        $dados = $request->validated();

        $campeonato = Campeonato::create($dados);
        if(isset($dados['id_pais'])) {
            $campeonato->paises()->sync($dados['id_pais']);
        }
        return response()->json($campeonato, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id, Campeonato $liga)
    {
        $campeonato = Campeonato::with('paises')->find($id);
        return response()->json($campeonato);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateCampeonatoRequest $request, Campeonato $liga)
    {
        $dados = $request->validated();

        $campeonato = Campeonato::find($id);
        if(isset($dados['id_pais'])) {
            $campeonato->paises()->sync($dados['id_pais']);
        }
        $campeonato->update($dados);

        return response()->json($campeonato);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Campeonato $liga)
    {
        Campeonato::destroy($id);
        return response()->json(['msg' => 'Campeonato deletado com sucesso']);
    }
}
