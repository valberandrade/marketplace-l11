<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Painel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrapicons-iconpicker.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body class="sb-nav-fixed">

@include('admin.layouts.navbar')

<!----- SIDEBAR ------>
<div id="layoutSidenav">

    @include('admin.layouts.sidebar')

    <div id="layoutSidenav_content" style="padding-left: 0; top: 0;">

        <!------------------ MAIN CONTENT ----------------->
        <main>

            @yield('content')

        </main>

        <!------------------ FOOTER ----------------->
        @include('admin.layouts.footer')

    </div><!-- layoutSidenav_content -->

</div><!-- layoutSidenav -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('backend/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('backend/assets/demo/chart-bar-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('backend/js/datatables-simple-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('backend/js/bootstrapicon-iconpicker.js') }}"></script>
<script src="{{ asset('backend/js/scripts.js') }}"></script>

<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            @php
            toastr()->error($error);
            @endphp
        @endforeach
    @endif
</script>
<script>
    $(document).ready(function (){

        $('.iconpicker').iconpicker({
            // customize the icon picker with the following options
            title: 'Escolha seu ícone',
            selected: false,
            defaultValue: false,
            placement: "bottom",
            collision: "none",
            animation: true,
            hideOnSelect: true,
            showFooter: true,
            searchInFooter: false,
            mustAccept: false,
            selectedCustomClass: "bg-primary",
            fullClassFormatter: function (e) {
                return e;
            },
            input: "input,.iconpicker-input",
            inputSearch: false,
            container: false,
            component: ".input-group-addon,.iconpicker-component, .input-group-text",
            templates: {
                popover: '<div class="iconpicker-popover popover" role="tooltip"><div class="arrow"></div>' + '<div class="popover-title"></div><div class="popover-content"></div></div>',
                footer: '<div class="popover-footer"></div>',
                buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm" type="button">Cancelar</button>' + ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm" type="button">Aceitar</button>',
                search: '<input type="search" class="form-control iconpicker-search" placeholder="Escreva para filtrar" />',
                iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
                iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>'
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.delete-item', function (event){
            event.preventDefault();
            let deleteUrl = $(this).attr('href');

            Swal.fire({
                title: "Você tem certeza?",
                text: "Você não poderá reverter isso!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, exclua-o!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,
                        success: function (data){
                            if (data.status === 'success'){
                                Swal.fire({
                                    title: "Excluído!",
                                    text: "Seu arquivo foi excluído com sucesso.",
                                    icon: "success"
                                });

                                window.location.reload();
                            }
                        },
                        error: function (xhr, status, error){
                            console.log(error);
                        }
                    });
                }
            });
        })
    })
</script>
</body>
</html>
