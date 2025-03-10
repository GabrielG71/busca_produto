<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller {
    public function index(Request $request) {
        $query = Produto::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nome', 'like', "%{$search}%")
                  ->orWhere('descricao', 'like', "%{$search}%");
        }
    
        $produtos = $query->get();
    
        return view('menu', compact('produtos'));
    }

    public function darBaixa(Request $request, $id) {
        $produto = Produto::findOrFail($id);
        $quantidadeBaixa = $request->input('quantidade');

        if ($quantidadeBaixa <= 0 || $quantidadeBaixa > $produto->quantidade_estoque) {
            return back()->with('error', 'Quantidade inválida.');
        }

        $produto->quantidade_estoque -= $quantidadeBaixa;

        if ($produto->quantidade_estoque <= 0) {
            $produto->delete();
        } else {
            $produto->save();
        }

        return back()->with('success', 'Baixa aplicada com sucesso.');
    }
}