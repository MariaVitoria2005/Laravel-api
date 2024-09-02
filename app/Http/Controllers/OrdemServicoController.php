<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\OrdemServico;
use Illuminate\Http\Request;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordemservicos = OrdemServico::with('Cliente','Servico')->get();

        return response()->json([
            'status'=> true,
            'ordemservicos'=> $ordemservicos
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
        $ordemservico = OrdemServico::create($request->all());

        return response()->json([
            'status' => true,
            'messagem' => "OrdemServico Criado com sucesso!",
            'ordemservicos' => $ordemservico,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ordemservico = OrdemServico::find($id);

        if (!$ordemservico){
            return response()->json(['message' => 'OrdemServico não encontrado'],404);
        }

        return response()->json([
            'status' => true,
            'ordemservicos' => $ordemservico
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
        $ordemservicos = OrdemServico::find($id);

        if (!$ordemservicos){
            return response()->json(['message' => 'OrdemServico não encontrado'],404);
        }

        $validator = OrdemServico::make($request->all(),[
            'nome' => 'string|max:255',
            'valor' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros' => $validator->erros()],422);
        }

        $ordemservicos->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'OrdemServico atualizado com sucesso!',
            'ordemservicos' => $ordemservicos
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        {
            $ordemservico = OrdemServico::find($id);
            if (!$ordemservico){
                return response()->json(['message' => 'OrdemServico não encontrado'],404);
            }
    
            $ordemservico->delete();
            return response()->json(['message' => 'OrdemServico removido com sucesso']);
        }
    }
}
