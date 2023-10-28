<?php

namespace App\Http\Controllers;
use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $times = Time::all();
        return response()->json($times);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate(
            [
                'nome' => 'required',
                'url_brasao' => 'required',
                'fundacao' => 'required|date'
            ]
        );

        $time = Time::create($dados);

        return response()->json($time);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $time = Time::with('estadios')->find($id);
        return response()->json($time);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $dados = $request->validate(
            [
                'nome' => 'string',
                'url_brasao' => 'string',
            ]
        );

        $time = Time::find($id);
        $time->update($dados);

        return response()->json($time);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idTime)
    {
        Time::destroy($idTime);
        return response()->json(['msg' => 'Time deletado com sucesso']);
    }
}
