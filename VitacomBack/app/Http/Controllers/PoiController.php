<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poi;
use App\Http\Requests\PoiRequest;

class PoiController extends Controller
{
    public function index()
    {
        $pois = Poi::all();
        return response()->json(['pois' => $pois], 200);
    }

    public function show($id)
    {
        $poi = Poi::find($id);
        if (!$poi) {
            return response()->json(['message' => 'Poi not found'], 404);
        }
        return response()->json(['poi' => $poi], 200);
    }

    public function store(PoiRequest $request)
    {
        $poi = Poi::create($request->validated());

        return response()->json([
            'message' => 'Poi created successfully',
            'poi' => $poi
        ], 201);
    }

    public function update(PoiRequest $request, $id)
    {
        $poi = Poi::find($id);
        if (!$poi) {
            return response()->json(['message' => 'Poi not found'], 404);
        }

        $poi->update($request->validated());

        return response()->json(['message' => 'Poi updated successfully'], 200);
    }

    public function destroy($id)
    {
        $poi = Poi::find($id);
        if (!$poi) {
            return response()->json(['message' => 'Poi not found'], 404);
        }
        $poi->delete();
        return response()->json(['message' => 'Poi deleted successfully'], 200);
    }
}