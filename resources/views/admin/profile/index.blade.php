@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Meus Dados</h1>
        </div>
        <hr />
        <div class="section-body">
            <h3 class="section-title">{{ auth()->user()->name }}</h3>
            <p class="section-lead">
                Utilize os campos abaixo para atualizar as suas informações.
            </p>

            {{--     BLOCO 1       --}}
            <div class="row mt-sm-4">

                <div class="col-12">

                    <div class="card">
                        <form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h4 class="card-title mb-0">Atualizar Perfil</h4>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-md-5 mb-4 mb-md-0 d-flex align-items-center">
                                        <div class="mr-4">
                                            @if(auth()->user()->image)
                                                <img src="{{ asset(auth()->user()->image) }}" alt="{{ auth()->user()->name }}" class="img-fluid img-profile rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%;" />
                                            @else
                                                <img src="{{ asset('backend/assets/img/undraw_profile.svg') }}" alt="{{ auth()->user()->name }}" class="img-fluid img-profile rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%;" />
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Foto do Perfil</label>
                                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
                                            @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}" name="name">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" name="email">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>{{-- CARD --}}
                </div>{{-- COL --}}
            </div> {{-- ROW --}}

            {{--     BLOCO 2       --}}
            <div class="row mt-sm-4">

                <div class="col-12">

                    <div class="card">
                        <form method="post" action="{{ route('admin.profile.password') }}">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h4 class="card-title mb-0">Atualizar Senha</h4>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex align-items-center mb-4">
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="form-group">
                                            <label>Senha atual</label>
                                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Informe a sua senha atual">
                                            @error('current_password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="form-group">
                                            <label>Nova Senha</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Informe uma nova senha de no mínimo 8 dígitos">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Confirme a Nova Senha</label>
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirme a sua Nova Senha">
                                            @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>{{-- CARD --}}
                </div>{{-- COL --}}
            </div> {{-- ROW --}}
        </div>
    </section>
@endsection
