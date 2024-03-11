<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BairroRequest; // Certifique-se de criar essa Request se ainda não existir
use App\Models\Bairro;
use Illuminate\Support\Facades\Validator;

class BairroController extends Controller
{
    public function index()
    {
        $bairros = Bairro::all();
        return response()->json(['bairros' => $bairros], 200);
    }

    public function show($id)
    {
        $bairro = Bairro::find($id);
        if (!$bairro) {
            return response()->json(['message' => 'Bairro não encontrado'], 404);
        }
        return response()->json(['bairro' => $bairro], 200);
    }

    public function store(BairroRequest $request)
    {
        try {
            $bairro = Bairro::create([
                'nome' => $request->nome,
                'regiao' => $request->regiao,
            ]);

            return response()->json([
                'message' => 'Bairro criado com sucesso',
                'bairro' => $bairro
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Erro ao criar bairro: ' . $exception->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $bairro = Bairro::find($id);
        if (!$bairro) {
            return response()->json(['message' => 'Bairro não encontrado'], 404);
        }

        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'regiao' => 'required|in:norte,sul,leste,oeste,centro,zona rural',
            // Adicione outras regras de validação conforme necessário
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $bairro->update($request->all());

        return response()->json(['message' => 'Bairro atualizado com sucesso'], 200);
    }

    public function destroy($id)
    {
        $bairro = Bairro::find($id);
        if (!$bairro) {
            return response()->json(['message' => 'Bairro não encontrado'], 404);
        }
        $bairro->delete();
        return response()->json(['message' => 'Bairro deletado com sucesso'], 200);
    }
}
