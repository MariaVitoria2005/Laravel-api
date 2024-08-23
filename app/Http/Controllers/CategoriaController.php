<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();

        return response()->json([
            'status' => true,
            'categorias' => $categorias
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
        $categoria = Categoria::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "categoria Criado com sucesso!",
            'categoria' => $categoria
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria){
            return response()->json(['message' => 'categoria não encontrado'],404);
        }

        return response()->json([
            'status' => true,
            'categoria' => $categoria
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoria= Categoria::find($id);

        if (!$categoria){
            return response()->json(['message' => 'Categoria não encontrado'],404);
        }

        $validator = Validator::make($request->all(),[
            'nome' => 'string|max:255',
            'valor' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros' => $validator->erros()],422);
        }

        $categoria->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Categoria atualizado com sucesso!',
            'Categoria' => $categoria
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria){
            return response()->json(['message' => 'Categoria não encontrado'],404);
        }
    
        $categoria->delete();
        return response()->json(['message' => 'Categoria removido com sucesso']);
    }
}
