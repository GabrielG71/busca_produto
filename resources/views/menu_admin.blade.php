@extends('layout')

@section('title', 'Admin - Gerenciar Produtos')

@section('content')

<h1>Gerenciar Produtos</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

{{-- Formulário de Adição de Produto --}}
<h2>Adicionar Novo Produto</h2>
<form action="{{ route('produtos.store') }}" method="POST" class="mb-4">
    @csrf
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Preço</label>
        <input type="number" name="preco" class="form-control" step="0.01" required>
    </div>
    <div class="mb-3">
        <label>Quantidade em Estoque</label>
        <input type="number" name="quantidade_estoque" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Adicionar Produto</button>
</form>

{{-- Tabela de Produtos --}}
<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->descricao }}</td>
            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
            <td>{{ $produto->quantidade_estoque }}</td>
            <td>
                {{-- Botão de Editar --}}
                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary btn-sm">Editar</a>

                {{-- Formulário de Remoção --}}
                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Tem certeza que deseja remover este produto?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                </form>

                {{-- Formulário de Dar Baixa --}}
                <form action="{{ route('produtos.baixa', $produto->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmarBaixa(event, this)">
                    @csrf
                    <input type="number" name="quantidade" class="form-control d-inline w-50" min="1" max="{{ $produto->quantidade_estoque }}" required>
                    <button type="submit" class="btn btn-warning btn-sm">Dar Baixa</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Nenhum produto cadastrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<script>
function confirmarBaixa(event, form) {
    event.preventDefault();
    let quantidade = form.querySelector('input[name="quantidade"]').value;

    if (quantidade <= 0) {
        alert('Quantidade inválida!');
        return false;
    }

    if (confirm('Deseja dar baixa de ' + quantidade + ' unidade(s) neste produto?')) {
        form.submit();
    }
}
</script>

@endsection