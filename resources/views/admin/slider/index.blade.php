@extends('admin.layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-3 mb-md-0 text-gray-800">Slide Destaque</h1>
        <a href="{{ route('admin.slider.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Cadastrar Novo</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Todos os Slides</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered my-3 datatable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Imagem</th>
                        <th>Título 1</th>
                        <th class="text-left">Valor</th>
                        <th>Status</th>
                        <th>Cadastrado em</th>
                        <th class="text-center">Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Imagem</th>
                        <th>Título 1</th>
                        <th class="text-left">Valor</th>
                        <th>Status</th>
                        <th>Cadastrado em</th>
                        <th class="text-center">Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($sliders as $slider)
                    <tr>
                        <td class="text-center">{{ $slider->id }}</td>
                        <td class="text-center"><img src="{{ asset($slider->banner) }}" class="img-fluid" width="120" /></td>
                        <td>{{ $slider->title_one }}</td>
                        <td class="text-left">R$ {{ number_format($slider->starting_price, 2,',','.') }}</td>
                        <td>{{ $slider->status === 1 ? 'Ativo' : 'Inativo' }}</td>
                        <td>{{ $slider->created_at->diffForHumans() }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-light mr-3"><i class="far fa-edit"></i></a>
                            <a href="{{ route('admin.slider.destroy', $slider->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">Nenhum dado encontrado</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('inc/DataTables/datatables.min.js') }}"></script>
    <script src='{{ asset('inc/DataTables/datatable-pt-br.js') }}'></script>
@endpush
