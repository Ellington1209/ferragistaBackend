<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = env('APP_PAGINATE', 10);
        $produtos = Produtos::paginate($perPage);
        return response()->json(['produtos' => $produtos]);
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
        $image = $request->file('imagem');
        $imagem_Retorno = null;

        // Verifica se a imagem foi enviada
        if ($image) {
            $imagem_Retorno = $image->store('Imagens/produtos', 'public');
        }

        try {
            $produtos = new Produtos();
            $produtos->nome = $request->input('nome');
            $produtos->descricao = $request->input('descricao');
            $produtos->codigo = $request->input('codigo');

            // Corrigir o formato do preço de compra
            $precoCompra = str_replace(',', '.', $request->input('preco_compra'));
            $produtos->preco_compra = (float)$precoCompra;

            $precoVenda = str_replace(',', '.', $request->input('preco_venda'));
            $produtos->preco_venda = (float)$precoVenda;

            $produtos->quantidade_estoque = $request->input('quantidade_estoque');
            $produtos->categoria_id = $request->input('categoria_id');
            $produtos->imagem = $imagem_Retorno;
            $produtos->save();

            // Retornar resposta JSON de sucesso
            return response()->json(['success' => 'Produto criado com sucesso '], 201);
        } catch (\Exception $e) {
            // Retornar resposta JSON de erro
            return response()->json(['error' => 'Erro ao criar produto '], 404);
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
