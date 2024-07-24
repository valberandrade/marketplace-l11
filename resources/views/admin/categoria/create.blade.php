@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Categorias</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Categorias</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h6 class="mb-0">Cadastrar nova Categoria</h6>
                <a href="{{ route('admin.categoria.index') }}" title="Voltar" class="btn btn-success btn-sm"><i class="fas fa-chevron-left me-2"></i>Voltar</a>
            </div>
            <div class="card-body">

                <form method="post" action="{{ route('admin.categoria.store') }}" enctype="multipart/form-data">
                    @csrf

                    <label for="icone" class="form-label">Ícone</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"></span>
                        <input type="text" class="form-control iconpicker" placeholder="Selecione seu ícone" aria-label="Icone Picker" aria-describedby="basic-addon1" name="icone" value="{{ old('icone') }}">
                    </div>

                    <div class="mb-3">
                        <label for="nome" class="form-label">Categoria</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Adicione a categoria">
                    </div>

                    <label for="status" class="form-label">Ativo?</label>
                    <select class="form-select mb-3" name="status" aria-label="status">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>

                </form>

            </div><!-- CARD-BODY -->
        </div>
    </div>

@endsection
