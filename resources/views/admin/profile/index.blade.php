@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Perfil</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Atualize seu perfil</li>
        </ol>
    </div>

    <div class="section-body px-3">
        <div class="row mt-sm-4">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="card">
                    <h6 class="card-header">Seu perfil</h6>
                    <form method="post" action="{{ route('admin.profile.update') }}" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="form-group col-md-2 mb-3">
                                    @if(!\Illuminate\Support\Facades\Auth::user()->image)
                                    <img src="{{ asset('backend/assets/img/padrao.jpg') }}" alt="{{ \Illuminate\Support\Facades\Auth::user()->name }}" title="{{ \Illuminate\Support\Facades\Auth::user()->name }}" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;" />
                                    @else
                                        <img src="{{ asset(\Illuminate\Support\Facades\Auth::user()->image) }}" alt="{{ \Illuminate\Support\Facades\Auth::user()->name }}" title="{{ \Illuminate\Support\Facades\Auth::user()->name }}" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;" />
                                    @endif
                                </div>
                                <div class="form-group col-md-10 mb-3">
                                    <label>Imagem do Perfil</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Nome</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}" name="name">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" name="email">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <h6 class="card-header">Atualizar senha</h6>
                    <form method="post" action="{{ route('admin.profile.update.password') }}" class="needs-validation">
                        @csrf
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="form-group col-12 mb-3">
                                    <label>Senha Atual</label>
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Informe a senha atual">
                                    @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-12 mb-3">
                                    <label>Nova senha</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Informe a nova senha">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Confirme a sua senha</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirme a nova senha">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
