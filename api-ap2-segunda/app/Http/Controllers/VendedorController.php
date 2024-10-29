<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendedorController extends Controller
{
    public function criar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:15',
            'ano nascimento' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');
        }

        $customer = Vendedor::create($request->all());
        return ApiResponse::ok('Vendedor criado com sucesso', $customer);


    }

    public function listarTodos()
    {
        $customers = 
        Vendedor::all();
        return ApiResponse::ok('lista de vendedores', $customers);
    }

    public function listarPeloId(int $id)
    {
        $customer = Vendedor::findOrFail($id);
        return ApiResponse::ok('vendedores a ser listados', $customer);
        

    }

    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:15',
            'ano nascimento' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return Apiresponse::error($validator->errors(), 'Validation error');
        }

        $customer = 
        Vendedor::findOrFail($id);
        $customer->update($request->all());

        return ApiResponse::ok('Vendedor atualizado com sucesso', $customer);
    }

    public function remover(int $id)
    {
        $customer = Vendedor::findOrFail($id);
        $customer->delete();
        return ApiResponse::ok('Vendedor removido com sucesso', $customer);

    }


}
