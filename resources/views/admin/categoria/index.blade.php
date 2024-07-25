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
                                <td><i class="{{ $categoria->icone }}" style="font-size: 20px;"></i></td>
                                <td>{{ $categoria->nome }}</td>
                                <td>{{ $categoria->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input muda-status" type="checkbox" id="flexSwitchCheckChecked" @if($categoria->status === 1) checked @endif name="status" data-id="{{ $categoria->id }}">
                                    </div>
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

    @push('scripts')
        <script>
            $(document).ready(function (){
                $('.muda-status').on('click', function (){
                    let checando = $(this).is(':checked');
                    let id = $(this).attr('data-id');

                    $.ajax({
                        url: "{{ route('admin.categoria.mudastatus') }}",
                        method: 'PUT',
                        data: {
                            status: checando,
                            id: id
                        },
                        success: function (data){
                            toastr.success(data.message);
                        },
                        error: function (xhr, status, error){
                            toastr.error(error.error);
                        }
                    });
                });
            });
        </script>
    @endpush

@endsection
