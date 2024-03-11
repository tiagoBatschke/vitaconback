<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

use App\Http\Requests\RegiserRequest;
use DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function Login(Request $request){

    	try{

    		if (Auth::attempt($request->only('email','password'))) {
    			$user = Auth::user();
    			$token = $user->createToken('app')->accessToken;

    			return response([
    				'message' => "Successfully Login",
    				'token' => $token,
    				'user' => $user
    			],200); // States Code
    		}

    	}catch(Exception $exception){
    		return response([
    			'message' => $exception->getMessage()
    		],400);
    	}
    	return response([
    		'message' => 'Invalid Email Or Password' 
    	],401);

    } // end method 



    public function Register(RegiserRequest $request){
    	try{

    		$user = User::create([
				'name' => $request->name,
				'email' => $request->email,
				'password' => Hash::make($request->password),
				'status' => $request->status, // Adiciona o campo "status" à criação do usuário
				'role' => $request->role,
				'telefone' => $request->telefone,
				'cnpj' => $request->cnpj,
				'contato' => $request->contato,

			]);
    		$token = $user->createToken('app')->accessToken;


			
    		return response([
    			'message' => "Registration Successfull",
    			'token' => $token,
    			'user' => $user
    		],200);

	    	}catch(Exception $exception){
	    		return response([
	    			'message' => $exception->getMessage()
	    		],400);
	    	}


			
		} // end mehtod 
		
		
		
		public function checkToken(Request $request)
		{
			try {
				// Verifica se o usuário está autenticado usando o token fornecido
				if (Auth::check()) {
					return response()->json(['message' => 'Token válido!'], 200);
				}
			} catch (\Exception $exception) {
				return response()->json(['message' => $exception->getMessage()], 400);
			}
	
			return response()->json(['message' => 'Token inválido'], 401);
		}


}
 