<?php

namespace App\Http\Controllers;

use App\Models\Diferencial;
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
        $diferenciais = Diferencial::all();
        return response()->json($diferenciais);
    }

    /**
     * Store a newly created diferencial in storage.
     *
     * @param  \Illuminate\Http\DiferencialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiferencialRequest $request)
    {
        $diferencial = Diferencial::create($request->validated());
        return response()->json($diferencial, 201);
    }

    /**
     * Display the specified diferencial.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diferencial = Diferencial::findOrFail($id);
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
        $diferencial = Diferencial::findOrFail($id);
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
        $diferencial = Diferencial::findOrFail($id);
        $diferencial->delete();
        return response()->json(null, 204);
    }
}