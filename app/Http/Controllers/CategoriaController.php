<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = env('APP_PAGINATE', 10); // Define o número de itens por página (default: 10)

        // Consulta as categorias e aplica a paginação
        $categorias = Categoria::paginate($perPage);

        // Retorna as categorias paginadas como parte da resposta JSON
        return response()->json(['categorias' => $categorias]);
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
        $categoria = new Categoria();
        $categoria->categoria = $request->input("categoria");
        $categoria->save();

        return response()->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['error' => 'Categoria não existe'], 404); // 404 para indicar que a categoria não foi encontrada
        }

        return response()->json(['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Encontre a categoria pelo ID
        $categoria = Categoria::find($id);

        // Verifique se a categoria foi encontrada
        if (!$categoria) {
            return response()->json(['error' => 'Categoria não existe'], 404);
        }

        // Atualize a coluna 'categoria' com o valor fornecido na solicitação
        $categoria->categoria = $request->input('categoria');
        $categoria->save();


        return response()->json(['message' => 'Categoria atualizada com sucesso'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        if($categoria){
            $categoria->delete();
            return response()->json(['message' => 'Categoria excluida com sucesso', 200]);
        }
        return response()->json(['error' => 'não foi posssivel excluir a categoria !', 404]);
    }
}
