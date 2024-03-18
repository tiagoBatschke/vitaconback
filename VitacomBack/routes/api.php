<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AllUsersController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\BairroController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\TiposDeUsoController;
use App\Http\Controllers\ImageUploadController;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
 
Route::post('/upload-image', [ImageUploadController::class, 'uploadImage']);
 // Login Routes 
Route::post('/login',[AuthController::class, 'Login']);

 // Register Routes 
Route::post('/register',[AuthController::class, 'Register']);

Route::middleware('auth:api')->get('/check-token', [AuthController::class, 'checkToken']);

 // Forget Password Routes 
Route::post('/forgetpassword',[ForgetController::class, 'ForgetPassword']);

 // Reset Password Routes 
Route::post('/resetpassword',[ResetController::class, 'ResetPassword']);

 // Current User Route 
Route::get('/user',[UserController::class, 'User'])->middleware('auth:api');


Route::get('/UserByClient/{id}',[AllUsersController::class, 'getUserByClient']);

 // Current User Route 
Route::get('/allusers',[AllUsersController::class, 'User'])->middleware('auth:api');

Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/clientes/{id}', [ClienteController::class, 'show']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::put('/clientes/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);



Route::get('/projetos', [ProjetoController::class, 'index']);
Route::get('/projetos/{id}', [ProjetoController::class, 'show']);
Route::post('/projetos', [ProjetoController::class, 'store']);
Route::put('/projetos/{id}', [ProjetoController::class, 'update']);
Route::delete('/projetos/{id}', [ProjetoController::class, 'destroy']);

Route::get('/bairros', [BairroController::class, 'index']);
Route::get('/bairros/{id}', [BairroController::class, 'show']);
Route::post('/bairros', [BairroController::class, 'store']);
Route::put('/bairros/{id}', [BairroController::class, 'update']);
Route::delete('/bairros/{id}', [BairroController::class, 'destroy']);

Route::get('/cidades', [CidadesController::class, 'index']);
Route::get('/cidades/{id}', [CidadesController::class, 'show']);
Route::post('/cidades', [CidadesController::class, 'store']);
Route::put('/cidades/{id}', [CidadesController::class, 'update']);
Route::delete('/cidades/{id}', [CidadesController::class, 'destroy']);


Route::get('/tiposDeUso', [TiposDeUsoController::class, 'index']);
Route::get('/tiposDeUso/{id}', [TiposDeUsoController::class, 'show']);
Route::post('/tiposDeUso', [TiposDeUsoController::class, 'store']);
Route::put('/tiposDeUso/{id}', [TiposDeUsoController::class, 'update']);
Route::delete('/tiposDeUso/{id}', [TiposDeUsoController::class, 'destroy']);