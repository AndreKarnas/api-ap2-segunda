<?php

use App\Http\Controllers\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('/vendedor',[VendedorController::class, 'listarTodos']);
route::post('/vendedor',[VendedorController::class, 'Criar']);
route::put('/vendedor/{id}',[VendedorController::class, 'editar']);
route::delete('/vendedor/{id}',[VendedorController::class, 'remover']);
route::get('/vendedor/{id}',[VendedorController::class, 'listarPeloId']);

route::get('/produto',[VendedorController::class, 'listarTodos']);
route::post('/produto',[VendedorController::class, 'Criar']);
route::put('/produto/{id}',[VendedorController::class, 'editar']);
route::delete('/produto/{id}',[VendedorController::class, 'remover']);
route::get('/produto/{id}',[VendedorController::class, 'listarPeloId']);