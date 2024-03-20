<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-wrench"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Opciones</span>
                <div class="dropdown-divider"></div>
                {{-- <a class="dropdown-item" href="{{ route('customUsers.profile') }}">
                    <i class="fas fa-user mr-2"></i> Perfil
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a> --}}
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{-- {{ route('logout') }} --}}
                    <i class="fas fa-envelope mr-2"></i> Desconectar
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <form id="logout-form" action="" method="POST" class="d-none">
                    {{-- {{ route('logout') }} --}}
                    @csrf
                </form>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>
