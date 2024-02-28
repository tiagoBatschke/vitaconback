<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json(['clientes' => $clientes], 200);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
        return response()->json(['cliente' => $cliente], 200);
    }

    public function store(ClienteRequest $request)
    {
        try {
            $cliente = Cliente::create([
                'nome' => $request->nome,
                'cnpj' => $request->cnpj,
                'contato' => $request->contato,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'celular' => $request->celular, 
                'logo' => $request->logo, 
                'status' => $request->status,
            ]);
    
            return response()->json([
                'message' => 'Cliente criado com sucesso',
                'cliente' => $cliente
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Erro ao criar cliente: ' . $exception->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            // Adicione as outras regras de validação conforme necessário
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $cliente->update($request->all());

        return response()->json(['message' => 'Cliente atualizado com sucesso'], 200);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
        $cliente->delete();
        return response()->json(['message' => 'Cliente deletado com sucesso'], 200);
    }
}
