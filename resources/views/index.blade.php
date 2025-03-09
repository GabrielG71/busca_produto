@extends('layout')

@section('title', 'Home')

@section('content')
<div class="d-flex align-items-center justify-content-center text-dark" style="min-height: 75vh; background-color: #fff;">
    <div class="container text-center">
        <h1 class="mb-4">Busca Produto</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="lead">
                    Esse site terá como função principal o registro dos produtos cadastrados de uma empresa.
                </p>
                <p>
                    <i class="bi bi-person-badge"></i> <strong>Login ADMIN</strong>: Pode cadastrar e editar os produtos.
                </p>
                <p>
                    <i class="bi bi-eye"></i> <strong>Login NORMAL</strong>: Pode visualizar e dar baixa nos produtos que saírem do estoque.
                </p>
                <a href="{{ route('login') }}" class="btn btn-dark mt-3">Acessar o Sistema</a>
            </div>
        </div>
    </div>
</div>
@endsection