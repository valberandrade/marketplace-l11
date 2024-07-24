@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Slides</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Slides</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h6 class="mb-0">Todos os Slides</h6>
                <a href="{{ route('admin.slider.create') }}" title="Novo Slider" class="btn btn-success btn-sm"><i class="far fa-plus-square me-2"></i>Novo Slider</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Banner</th>
                            <th>Título 1</th>
                            <th>Preço</th>
                            <th>Posição</th>
                            <th>Cadastrado em</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Banner</th>
                            <th>Título 1</th>
                            <th>Preço</th>
                            <th>Posição</th>
                            <th>Cadastrado em</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($sliders as $slider)
                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td>
                                <img src="{{ asset($slider->banner) }}" width="80" />
                            </td>
                            <td>{{ $slider->title_one }}</td>
                            <td>{{ number_format($slider->starting_price,2,",",".") }}</td>
                            <td>{{ $slider->serial }}</td>
                            <td>{{ $slider->created_at->diffForHumans() }}</td>
                            <td>
                                @if($slider->status === 1)
                                    <span class="badge bg-success rounded-pill p-2">Ativo</span>
                                @else
                                    <span class="badge bg-danger rounded-pill p-2">Desativado</span>
                                @endif
                            </td>
                            <td class="d-flex align-items-center">
                                <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-primary btn-sm me-2"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.slider.destroy', $slider->id) }}" class="btn btn-danger btn-sm delete-item"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">Nenhum slider encontrado</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
