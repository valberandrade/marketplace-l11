@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Slides</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.slider.index') }}">Slides</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h6 class="mb-0">Cadastrar novo Slider</h6>
                <a href="{{ route('admin.slider.index') }}" title="Voltar" class="btn btn-success btn-sm"><i class="fas fa-chevron-left me-2"></i>Voltar</a>
            </div>
            <div class="card-body">

                <form method="post" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="banner" class="form-label">Imagem (1300x500px)</label>
                        <input type="file" class="form-control" id="banner" name="banner">
                    </div>

                    <div class="mb-3">
                        <label for="title_one" class="form-label">Título 1</label>
                        <input type="text" class="form-control" id="title_one" name="title_one" value="{{ old('title_one') }}" placeholder="Adicione o título">
                    </div>

                    <div class="mb-3">
                        <label for="title_two" class="form-label">Título 2</label>
                        <input type="text" class="form-control" id="title_two" name="title_two" value="{{ old('title_two') }}" placeholder="Adicione o título 2">
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="url" class="form-control" id="link" name="link" placeholder="Adicione o link" value="{{ old('link') }}">
                    </div>

                    <div class="mb-3">
                        <label for="starting_price" class="form-label">Preço</label>
                        <input type="text" class="form-control" id="starting_price" name="starting_price" value="{{ old('starting_price') }}" placeholder="Adicione o Preço">
                    </div>

                    <div class="mb-3">
                        <label for="serial" class="form-label">Ordem</label>
                        <input type="number" class="form-control" id="serial" name="serial" value="{{ old('serial') }}" placeholder="Informe a ordem de exibição">
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
