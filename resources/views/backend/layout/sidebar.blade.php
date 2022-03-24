<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('') }}" class="brand-link">
        <img src="{{ asset('assets/images/brand.jpeg') }}" alt="BFL" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            {{ config('app.name') ?? 'BFL Backend' }}
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
    <img src="{{ asset('assets/images/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
    <a href="#" class="d-block">{{ auth()->user()->last_name ?? '' }}</a>
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                User Management
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-lock nav-icon"></i>
                        <p>Roles</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
        Caselaws
        <i class="right fas fa-angle-left"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-hand-point-left nav-icon"></i>
                    <p>Appellants</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.courts.index') }}" class="nav-link active">
                    <i class="fas fa-landmark nav-icon"></i>
                    <p>Courts</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-gavel nav-icon"></i>
                    <p>Judges</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-building nav-icon"></i>
                    <p>Law Firms</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-tie nav-icon"></i>
                    <p>Lawyers</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-gavel nav-icon"></i>
                    <p>Magistrates</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Respondents</p>
                </a>
            </li>
        </ul>
        </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
</aside>