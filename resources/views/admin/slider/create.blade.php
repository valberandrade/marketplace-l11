@extends('admin.layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-3 mb-md-0 text-gray-800">Slide Destaque</h1>
        <a href="{{ route('admin.slider.index') }}" class="btn btn-primary"><i class="fas fa-chevron-circle-left mr-2"></i>Voltar</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cadastrar Slide</h6>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="banner">Imagem (1300x500px)</label>
                    <input type="file" class="form-control-file @error('banner') is-invalid @enderror" name="banner" id="banner" >
                    @error('banner')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="title_one">Título 1</label>
                    <input type="text" class="form-control @error('title_one') is-invalid @enderror" name="title_one" placeholder="Adicione o título" id="title_one" value="{{ old('title_one') }}" />
                    @error('title_one')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="title_two">Título 2</label>
                    <input type="text" class="form-control @error('title_two') is-invalid @enderror" name="title_two" placeholder="Adicione o título" id="title_two" value="{{ old('title_two') }}" />
                    @error('title_two')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="starting_price">Valor</label>
                    <input type="text" class="form-control @error('starting_price') is-invalid @enderror" name="starting_price" placeholder="Adicione o valor" id="starting_price" value="{{ old('starting_price') }}" />
                    @error('starting_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="link">Link</label>
                    <input type="url" class="form-control @error('link') is-invalid @enderror" name="link" placeholder="Adicione o link" id="link" value="{{ old('link') }}" />
                    @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="serial">Ordem de Exibição</label>
                    <input type="number" class="form-control @error('serial') is-invalid @enderror" name="serial" placeholder="Informe a ordem de exibição" id="serial" value="{{ old('serial') }}" />
                    @error('serial')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="status">Status</label>
                    <select class="custom-select" name="status" id="status">
                        <option value="1">Ativo</option>
                        <option value="2">Inativo</option>
                    </select>
                </div>
                <input type="submit" value="Cadastrar" class="btn btn-primary" />
            </form>

        </div>
    </div>

@endsection
