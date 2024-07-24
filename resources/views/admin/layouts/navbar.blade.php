<nav class="navbar navbar-expand navbar-dark bg-dark">

    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">Marketplace Laravel</a>

    <!-- Sidebar Toggle-->
    <button class="btn btn-li btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars text-light"></i></button>

    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="post" action="">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Buscar por..." aria-label="Buscar por..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if(\Illuminate\Support\Facades\Auth::user()->image)
                    <img src="{{ asset(\Illuminate\Support\Facades\Auth::user()->image) }}" alt="{{ \Illuminate\Support\Facades\Auth::user()->name }}" title="{{ \Illuminate\Support\Facades\Auth::user()->name }}" class="img-fluid me-2" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;" />
                @else
                    <img src="{{ asset('backend/assets/img/padrao.jpg') }}" alt="{{ \Illuminate\Support\Facades\Auth::user()->name }}" title="{{ \Illuminate\Support\Facades\Auth::user()->name }}" class="img-fluid" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;" />
                @endif
                    Olá, {{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('admin.profile.index') }}"><i class="fas fa-user me-2"></i>Perfil</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Configurações</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="#"
                           onclick="event.preventDefault();
                           this.closest('form').submit();"><i class="fas fa-sign-out-alt me-2"></i>Sair
                        </a>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
