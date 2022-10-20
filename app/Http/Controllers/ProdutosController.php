<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        return response()->json(['produtos' => Produto::all()]);
    }

    public function store(Request $request)
    {
        try {
            Produto::create($request->all());
            return response()->json(['mensagem' => 'Produto inserido com sucesso.', 'icon' => 'success']);    
        } catch (\Exception $e) {
            return response()->json(['mensagem' => 'Houve um erro ao inserir o produto.', 'icon' => 'error']);    
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            Produto::findOrFail($id)->update($request->all());
            return response()->json(['mensagem' => 'Produto atualizado com sucesso.', 'icon' => 'success']);    
        } catch (\Exception $e) {
            return response()->json(['mensagem' => 'Houve um erro ao atualizar o produto.', 'icon' => 'error']);    
        }
    }

    public function destroy($id)
    {
        try {
            Produto::findOrFail($id)->delete();
            return response()->json(['mensagem' => 'Produto excluído com sucesso.', 'icon' => 'success']);    
        } catch (\Exception $e) {
            return response()->json(['mensagem' => 'Houve um erro ao excluir o produto.', 'icon' => 'error']);    
        }
    }
}