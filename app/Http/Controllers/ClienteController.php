<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente = Cliente::all();

        return response()->json([
            'status' => true,
            'cliente' => $cliente
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Cliente Criado com sucesso!",
            'cliente' => $cliente
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente){
            return response()->json(['message' => 'Cliente não encontrado'],404);
        }

        return response()->json([
            'status' => true,
            'cliente' => $cliente
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cliente= Cliente::find($id);

        if (!$cliente){
            return response()->json(['message' => 'Cliente não encontrado'],404);
        }

        $validator = Validator::make($request->all(),[
            'nome' => 'string|max:255',
            'valor' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros' => $validator->erros()],422);
        }

        $cliente->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Cliente atualizado com sucesso!',
            'cliente' => $cliente
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente){
            return response()->json(['message' => 'Cliente não encontrado'],404);
        }
    
        $cliente->delete();
        return response()->json(['message' => 'Cliente removido com sucesso']);
    }
}
