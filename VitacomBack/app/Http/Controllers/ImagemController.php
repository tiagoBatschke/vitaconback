<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ImagemController extends Controller
{
    public function uploadImagem(Request $request)
    {
        if ($request->hasFile('imagem')) {
            // Obtenha o arquivo de imagem enviado
            $imagem = $request->file('imagem');

            // Faça o upload da imagem para o Cloudinary
            $uploadResult = Cloudinary::upload($imagem->getRealPath(), [
                'folder' => 'imagens', // Defina o diretório no Cloudinary onde a imagem será armazenada
                'resource_type' => 'auto' // Detecta automaticamente o tipo de recurso (imagem neste caso)
            ]);

            // Retorne a URL da imagem recém-enviada
            return response()->json(['url' => $uploadResult->secure_url], 200);
        } else {
            return response()->json(['error' => 'Nenhuma imagem enviada.'], 400);
        }
    }
}
