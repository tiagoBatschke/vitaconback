<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User; // Certifique-se de importar o modelo User

class AllUsersController extends Controller
{
    public function User(Request $request){

        $user = Auth::user();

        // Verifica se o usuário autenticado é um administrador
        if ($user->role === 'admin') {
            // Retorna todos os usuários se for um administrador
            $users = User::all();
            return response()->json(['users' => $users], 200);
        } else {
            // Retorna apenas o usuário autenticado
            return response()->json(['user' => $user], 200);
        }
    }
}