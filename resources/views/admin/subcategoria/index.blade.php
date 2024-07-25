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
                <h6 class="mb-0">Todos as Subcategorias</h6>
                <a href="{{ route('admin.subcategoria.create') }}" title="Nova Subcategoria" class="btn btn-success btn-sm"><i class="far fa-plus-square me-2"></i>Nova Subcategoria</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Subcategoria</th>
                            <th>Categoria</th>
                            <th>Cadastrado em</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Subcategoria</th>
                            <th>Categoria</th>
                            <th>Cadastrado em</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($subcategorias as $subcategoria)
                            <tr>
                                <td>{{ $subcategoria->id }}</td>
                                <td>{{ $subcategoria->nome }}</td>
                                <td>{{ $subcategoria->categoria->nome }}</td>
                                <td>{{ $subcategoria->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input muda-status-sub" name="status" type="checkbox" @if($subcategoria->status == 1) checked @endif data-id="{{ $subcategoria->id }}">
                                    </div>
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.subcategoria.edit', $subcategoria->id) }}" class="btn btn-primary btn-sm me-2"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.subcategoria.destroy', $subcategoria->id) }}" class="btn btn-danger btn-sm delete-item"><i class="fas fa-trash"></i></a>
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
                $('.muda-status-sub').on('click', function (){
                    let check = $(this).is(':checked');
                    let id_sub = $(this).attr('data-id');

                    $.ajax({
                        url: "{{ route('admin.subcategoria.mudastatussub') }}",
                        method: 'PUT',
                        data: {
                            status: check,
                            id: id_sub
                        },
                        success: function (data){
                            toastr.success(data.message);
                        },
                        error: function (xhr, status, error){
                            console.log(error);
                        }
                    });
                });
            });
        </script>
    @endpush

@endsection
