<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClubeRequest;
use App\Http\Requests\UpdateClubeRequest;
use App\Models\Clube;

class ClubeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubes = Clube::all();
        return response()->json($clubes);
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
    public function store(StoreClubeRequest $request)
    {
        $dados = $request->validated();

        $clube = Clube::create($dados);

        return response()->json($clube);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clube = Clube::find($id);
        return response()->json($clube);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateClubeRequest $request)
    {

        $clube = Clube::find($id);
        $dados = $request->validated();
        $clube->update($dados);

        return response()->json($clube);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Clube::destroy($id);
        return response()->json(['msg' => 'Clube deletado com sucesso']);
    }
}
