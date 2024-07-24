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
                <h6 class="mb-0">Todos as Categorias</h6>
                <a href="{{ route('admin.categoria.create') }}" title="Nova Categoria" class="btn btn-success btn-sm"><i class="far fa-plus-square me-2"></i>Nova Categoria</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Ícone</th>
                            <th>Categoria</th>
                            <th>Cadastrado em</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Ícone</th>
                            <th>Categoria</th>
                            <th>Cadastrado em</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td><i class="{{ $categoria->icone }}"></i></td>
                                <td>{{ $categoria->nome }}</td>
                                <td>{{ $categoria->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if($categoria->status === 1)
                                        <span class="badge bg-success rounded-pill p-2">Ativo</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill p-2">Desativado</span>
                                    @endif
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.categoria.edit', $categoria->id) }}" class="btn btn-primary btn-sm me-2"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.categoria.destroy', $categoria->id) }}" class="btn btn-danger btn-sm delete-item"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Nenhuma categoria encontrada</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
