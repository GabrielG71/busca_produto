<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    // Exibe o menu normal com filtro de busca
    public function index(Request $request)
    {
        $query = Produto::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nome', 'like', "%{$search}%")
                  ->orWhere('descricao', 'like', "%{$search}%");
        }

        $produtos = $query->get();

        return view('menu', compact('produtos'));
    }

    // Aplica baixa no estoque
    public function darBaixa(Request $request, $id)
    {
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

    // Exibe o painel admin com todos os produtos
    public function admin()
    {
        $produtos = Produto::all();
        return view('menu_admin', compact('produtos'));
    }

    // Adiciona um novo produto
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'quantidade_estoque' => 'required|integer',
        ]);

        Produto::create($request->all());

        return redirect()->route('menu_admin')->with('success', 'Produto adicionado com sucesso!');
    }

    // Exibe o formulário de edição de produto
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('edit', compact('produto'));
    }

    // Atualiza os dados do produto
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'quantidade_estoque' => 'required|integer',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return redirect()->route('menu_admin')->with('success', 'Produto atualizado com sucesso!');
    }

    // Remove um produto
    public function destroy($id)
    {
        Produto::findOrFail($id)->delete();
        return redirect()->route('menu_admin')->with('success', 'Produto removido com sucesso!');
    }
}