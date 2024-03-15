<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TiposDeUsoRequest;
use App\Models\tiposDeUso;
use Illuminate\Support\Facades\Validator;

class TiposDeUsoController extends Controller
{
    public function index()
    {
        $tiposDeUso = tiposDeUso::all();
        return response()->json(['tiposDeUso' => $tiposDeUso], 200);
    }

    public function show($id)
    {
        $tiposDeUso = tiposDeUso::find($id);
        if (!$tiposDeUso) {
            return response()->json(['message' => 'tipo De Uso não encontrado'], 404);
        }
        return response()->json(['tiposDeUso' => $tiposDeUso], 200);
    }

    public function store(TiposDeUsoRequest $request)
    {
        try {
            $tipoDeUso = tiposDeUso::create([
                'nome' => $request->nome,
                
            ]);
    
            return response()->json([
                'message' => 'tipo De Uso criado com sucesso',
                'tipoDeUso' => $tipoDeUso
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Erro ao criar tipo De Uso: ' . $exception->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $tipoDeUso = tiposDeUso::find($id);
        if (!$tipoDeUso) {
            return response()->json(['message' => 'Projeto não encontrado'], 404);
        }

        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            // Adicione as outras regras de validação conforme necessário
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $projeto->update($request->all());

        return response()->json(['message' => 'tipo De Uso atualizado com sucesso'], 200);
    }

    public function destroy($id)
    {
        $tipoDeUso = tiposDeUso::find($id);
        if (!$tipoDeUso) {
            return response()->json(['message' => 'tipo De Uso não encontrado'], 404);
        }
        $tipoDeUso->delete();
        return response()->json(['message' => 'tipo De Uso deletado com sucesso'], 200);
    }
}
