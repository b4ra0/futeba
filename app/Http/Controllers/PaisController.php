<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaisRequest;
use App\Http\Requests\UpdatePaisRequest;
use App\Models\Pais;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paises = Pais::all();
        return response()->json($paises);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaisRequest $request)
    {
        $dados = $request->validate(
            [
                'nome' => 'required',
                'sigla' => 'required',
            ]
        );

        $pais = Pais::create($dados);

        return response()->json($pais);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pais = Pais::find($id);
        return response()->json($pais);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdatePaisRequest $request)
    {
        $dados = $request->validate(
            [
                'nome' => 'string',
                'sigla' => 'string',
            ]
        );

        $pais = Pais::find($id);
        $pais->update($dados);

        return response()->json($pais);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pais::destroy($id);
        return response()->json(['msg' => 'Pais deletado com sucesso']);
    }
}
