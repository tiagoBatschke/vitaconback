<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Http\Requests\CategoriasRequest;
use Illuminate\Support\Facades\Validator;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categorias = Categorias::all();
        return response()->json(['Categorias' => $Categorias], 200);
    }

    
      public function show($id)
      {
          $Categoria = Categorias::find($id);
          if (!$Categoria) {
              return response()->json(['message' => 'Cidade não encontrada'], 404);
          }
          return response()->json(['Categoria' => $Categoria], 200);
      }
  
    
     public function store(CategoriasRequest $request)
     {
         try {
             $Categoria =  Categorias::create([
                 'nome' => $request->nome,
             ]);
 
             return response()->json([
                 'message' => 'Cidade criada com sucesso',
                 'Categoria' => $Categoria
             ], 201);
         } catch (\Exception $exception) {
             return response()->json([
                 'message' => 'Erro ao criar Cidade: ' . $exception->getMessage()
             ], 400);
         }
     }



     public function update(Request $request, $id)
     {
         $Categoria = Categorias::find($id);
         if (!$Categoria) {
             return response()->json(['message' => 'Categoria não encontrada'], 404);
         }
 
         // Validação dos dados
         $validator = Validator::make($request->all(), [
             'nome' => 'required|string|max:255',
             // Adicione outras regras de validação conforme necessário
         ]);
 
         if ($validator->fails()) {
             return response()->json(['errors' => $validator->errors()], 400);
         }
 
         $Categoria->update($request->all());
 
         return response()->json(['message' => 'Categoria atualizada com sucesso'], 200);
     }
 
     public function destroy($id)
     {
         $Categoria = Categorias::find($id);
         if (!$Categoria) {
             return response()->json(['message' => 'Categorias não encontrada'], 404);
         }
         $Categoria->delete();
         return response()->json(['message' => 'Categorias deletada com sucesso'], 200);
     }
}
