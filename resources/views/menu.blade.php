@extends('layout')

@section('title', 'Menu')

@section('content')

<h1>Lista de Produtos</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="GET" action="{{ route('menu') }}" class="mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Pesquisar produto..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>

<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade em Estoque</th>
            <th>Dar baixa</th>
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
                <form action="{{ route('produtos.baixa', $produto->id) }}" method="POST" onsubmit="return confirmarBaixa(event, this)">
                    @csrf
                    <input type="number" name="quantidade" class="form-control d-inline w-50" min="1" max="{{ $produto->quantidade_estoque }}" required>
                    <button type="submit" class="btn btn-danger">Dar Baixa</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Nenhum produto encontrado.</td>
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

    if (confirm('Tem certeza que deseja dar baixa de ' + quantidade + ' unidade(s) neste produto?')) {
        form.submit();
    }
}
</script>

@endsection