<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjetoRequest;
use App\Models\Projeto;
use Illuminate\Support\Facades\Validator;

class ProjetoController extends Controller
{
    public function index()
    {
        $projetos = Projeto::all();
        return response()->json(['projetos' => $projetos], 200);
    }

    public function show($id)
    {
        $projeto = Projeto::find($id);
        if (!$projeto) {
            return response()->json(['message' => 'Projeto não encontrado'], 404);
        }
        return response()->json(['projeto' => $projeto], 200);
    }

    public function store(ProjetoRequest $request)
    {
        try {
            $projeto = Projeto::create([
                'nome' => $request->nome,
                'cliente_id' => $request->cliente_id,
                'tipos' => $request->tipos,
            ]);
    
            return response()->json([
                'message' => 'Projeto criado com sucesso',
                'projeto' => $projeto
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Erro ao criar projeto: ' . $exception->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $projeto = Projeto::find($id);
        if (!$projeto) {
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

        return response()->json(['message' => 'Projeto atualizado com sucesso'], 200);
    }

    public function destroy($id)
    {
        $projeto = Projeto::find($id);
        if (!$projeto) {
            return response()->json(['message' => 'Projeto não encontrado'], 404);
        }
        $projeto->delete();
        return response()->json(['message' => 'Projeto deletado com sucesso'], 200);
    }
}
