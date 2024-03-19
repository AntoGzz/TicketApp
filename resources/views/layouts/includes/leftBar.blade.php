<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="/" class="brand-link">
        <img src="{{ asset('tpl/v3/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TicketApp</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('tpl/v3/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <span id="infoUser" style="color: white;"></span><br>
                <span id="infoJob" style="color: white;"></span>
                {{-- <a href="#" class="d-block">Alexander Pierce</a> --}}
            </div>
        </div>

        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="/mainDashboard" class="nav-link {{ request()->is('mainDashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('events*', 'reporting*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p> Gestión de Eventos <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('events.index') }}"
                                class="nav-link {{ request()->is('events') ? 'active' : '' }}">
                                <i class="far fa-edit nav-icon"></i> <p> Eventos</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('reporting.index') }}"
                                class="nav-link {{ request()->is('reporting') ? 'active' : '' }}">
                                <i class="fas fa-chart-pie nav-icon"></i> <p>Reportería</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
            </ul>
        </nav>

    </div>

</aside>