<?php

namespace App\Http\Controllers;

use App\Models\Diferenciais;
use Illuminate\Http\Request;
use App\Http\Requests\DiferencialRequest;

class DiferenciaisController extends Controller
{
    /**
     * Display a listing of the diferenciais.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diferenciais = Diferenciais::all();
        return response()->json($diferenciais);
    }

    /**
     * Store a newly created diferencial in storage.
     *
     * @param  \Illuminate\Http\DiferencialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiferencialRequest $request){
        try {
            $diferencial = Diferenciais::create([
                'nome' => $request->nome,
                'area_comum' => $request->area_comum,
            ]);
    
            return response()->json([
                'message' => 'diferencial criado com sucesso',
                'diferencial' => $diferencial
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Erro ao criar Diferenciais: ' . $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified diferencial.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diferencial = Diferenciais::findOrFail($id);
        return response()->json($diferencial);
    }

    /**
     * Update the specified diferencial in storage.
     *
     * @param  \Illuminate\Http\DiferencialRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiferencialRequest $request, $id)
    {
        $diferencial = Diferenciais::findOrFail($id);
        $diferencial->update($request->validated());
        return response()->json($diferencial, 200);
    }

    /**
     * Remove the specified diferencial from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diferencial = Diferenciais::findOrFail($id);
        $diferencial->delete();
        return response()->json(null, 204);
    }
}