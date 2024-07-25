<div id="layoutSidenav_nav" style="position: relative;">
    <nav class="sb-sidenav accordion sb-sidenav-dark pt-0" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">Início</div>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Destaque</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                    Slider
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.slider.index') }}">Ver todos</a>
                        <a class="nav-link" href="{{ route('admin.slider.create') }}">Cadastrar novo</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategoria" aria-expanded="false" aria-controls="collapseCategoria">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Categorias
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCategoria" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.categoria.index') }}">Ver todas</a>
                        <a class="nav-link" href="{{ route('admin.categoria.create') }}">Cadastrar</a>
                        <a class="nav-link" href="{{ route('admin.subcategoria.index') }}">Subcategorias</a>
                    </nav>
                </div>

            </div><!-- nav -->

        </div><!-- sb-sidenav-menu -->

        <div class="sb-sidenav-footer">
            <div class="small">Logado como:</div>
            {{ \Illuminate\Support\Facades\Auth::user()->name }}
        </div><!-- sb-sidenav-footer -->

    </nav>

</div>
