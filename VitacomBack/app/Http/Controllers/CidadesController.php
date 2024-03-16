<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\CidadesRequest; // Certifique-se de criar essa Request se ainda não existir
use App\Models\Cidades;
use Illuminate\Support\Facades\Validator;

class CidadesController extends Controller
{
    public function index()
    {
        $Cidades = Cidades::all();
        return response()->json(['Cidades' => $Cidades], 200);
    }

    public function show($id)
    {
        $Cidade = Cidades::find($id);
        if (!$Cidade) {
            return response()->json(['message' => 'Cidade não encontrada'], 404);
        }
        return response()->json(['cidade' => $Cidade], 200);
    }

    public function store(CidadesRequest $request)
    {
        try {
            $Cidade =  Cidades::create([
                'nome' => $request->nome,
                'uf' => $request->uf,
                'bairro' => $request ->bairro
            ]);

            return response()->json([
                'message' => 'Cidade criada com sucesso',
                'Cidade' => $Cidade
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Erro ao criar Cidade: ' . $exception->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $Cidade = Cidades::find($id);
        if (!$Cidade) {
            return response()->json(['message' => 'Cidade não encontrada'], 404);
        }

        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'uf' => 'required|string|max:255',
            'bairro' => 'required|exists:bairros,id',
            // Adicione outras regras de validação conforme necessário
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $Cidade->update($request->all());

        return response()->json(['message' => 'Cidade atualizada com sucesso'], 200);
    }

    public function destroy($id)
    {
        $Cidade = Cidades::find($id);
        if (!$Cidade) {
            return response()->json(['message' => 'Cidades não encontrada'], 404);
        }
        $Cidade->delete();
        return response()->json(['message' => 'Cidades deletada com sucesso'], 200);
    }
}
