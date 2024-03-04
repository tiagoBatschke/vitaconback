<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagemController extends Controller
{
    public function uploadImagem(Request $request)
    {
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $path = $imagem->store('imagens', 'public'); // Isso salva a imagem na pasta "public/storage/imagens"
            
            return response()->json(['path' => $path], 200);
        } else {
            return response()->json(['error' => 'Nenhuma imagem enviada.'], 400);
        }
    }
}
