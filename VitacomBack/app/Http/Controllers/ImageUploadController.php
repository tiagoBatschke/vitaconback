<?php

namespace App\Http\Controllers;
use Cloudinary;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        // Verifica se a solicitação contém uma imagem
        if ($request->hasFile('image')) {
            // Faz o upload da imagem para o Cloudinary
            $image = $request->file('image');
            Cloudder::upload($image->getRealPath());
            $cloudinary_upload = Cloudder::getResult();

            // Retorna a URL da imagem no Cloudinary
            return response()->json(['url' => $cloudinary_upload['secure_url']], 200);
        }

        // Se não houver uma imagem na solicitação, retorna um erro
        return response()->json(['error' => 'No image found in the request.'], 400);
    }
}