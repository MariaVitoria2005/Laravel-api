<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdemServicoController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function(){
    Route::post('cadastrar-se', 'cadastrar');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/produtos', [ProdutoController::class, 'index']);
    Route::post('/produtos', [ProdutoController::class, 'store']);
    Route::put('/produtos/{id}', [ProdutoController::class, 'update']);
    Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);
    Route::get('/produtos/{id}', [ProdutoController::class, 'show']);

    Route::get('/categorias', [CategoriaController::class, 'index']);
    Route::post('/categorias', [CategoriaController::class, 'store']);
    Route::put('/categorias/{id}', [CategoriaController::class, 'update']);
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy']);
    Route::get('/categorias/{id}', [CategoriaController::class, 'show']);

    Route::get('/empresas', [EmpresaController::class, 'index']);
    Route::post('/empresas', [EmpresaController::class, 'store']);
    Route::put('/empresas/{id}', [EmpresaController::class, 'update']);
    Route::delete('/empresas/{id}', [EmpresaController::class, 'destroy']);
    Route::get('/empresas/{id}', [EmpresaController::class, 'show']);

    Route::get('/servicos', [ServicoController::class, 'index']);
    Route::post('/servicos', [ServicoController::class, 'store']);
    Route::put('/servicos/{id}', [ServicoController::class, 'update']);
    Route::delete('/servicos/{id}', [ServicoController::class, 'destroy']);
    Route::get('/servicos/{id}', [ServicoController::class, 'show']);

    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::post('/clientes', [ClienteController::class, 'store']);
    Route::put('/clientes/{id}', [ClienteController::class, 'update']);
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);
    Route::get('/clientes/{id}', [ClienteController::class, 'show']);

    Route::get('/ordemservicos', [OrdemServicoController::class, 'index']);
    Route::post('/ordemservicos', [OrdemServicoController::class, 'store']);
    Route::put('/ordemservicos/{id}', [OrdemServicoController::class, 'update']);
    Route::delete('/ordemservicos/{id}', [OrdemServicoController::class, 'destroy']);
    Route::get('/ordemservicos/{id}', [OrdemServicoController::class, 'show']);
});