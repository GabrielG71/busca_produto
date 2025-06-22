@extends('layout')

@section('title', 'Editar Produto')

@section('content')

<h1>Editar Produto</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $produto->nome }}" required>
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control" required>{{ $produto->descricao }}</textarea>
    </div>

    <div class="mb-3">
        <label>Preço</label>
        <input type="number" step="0.01" name="preco" class="form-control" value="{{ $produto->preco }}" required>
    </div>

    <div class="mb-3">
        <label>Quantidade em Estoque</label>
        <input type="number" name="quantidade_estoque" class="form-control" value="{{ $produto->quantidade_estoque }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="{{ route('admin.menu') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection