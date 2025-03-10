@extends('layout')

@section('title', 'Menu')

@section('content')
<h1>Lista de Produtos</h1>

<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade em Estoque</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->descricao }}</td>
            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
            <td>{{ $produto->quantidade_estoque }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection