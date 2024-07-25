@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Subcategorias</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Subcategorias</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h6 class="mb-0">Cadastrar nova Subcategoria</h6>
                <a href="{{ route('admin.subcategoria.index') }}" title="Voltar" class="btn btn-success btn-sm"><i class="fas fa-chevron-left me-2"></i>Voltar</a>
            </div>
            <div class="card-body">

                <form method="post" action="{{ route('admin.subcategoria.store') }}">
                    @csrf

                    <label for="categoria_id" class="form-label">Categoria</label>
                    <select class="form-select mb-3" name="categoria_id" id="categoria_id">
                        @forelse($categorias as $categoria)
                            @if($categoria->status == 1)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endif
                        @empty
                        <option>Nenhuma categoria encontrada</option>
                        @endforelse
                    </select>

                    <div class="mb-3">
                        <label for="nome" class="form-label">Subcategoria</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Adicione a subcategoria">
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
