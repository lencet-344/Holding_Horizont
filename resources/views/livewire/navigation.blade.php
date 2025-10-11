<div>
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
            <div class="row">
                <div class="col-6 collapse-brand">
                    <a href="#">
                        <img src="{{ asset('img/brand/blue.png') }}">
                    </a>
                </div>
                <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse"
                        data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                        aria-label="Toggle sidenav">
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">

            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}" wire:navigate>
                    <i class="ni ni-tv-2 text-primary"></i> Dashboard
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('profile.index') }}" wire:navigate>
                    <i class="fas fa-user text-blue"></i> Perfil
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('agronomic_expenses.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('agronomic_expenses.index') }}" wire:navigate>
                    <i class="fas fa-seedling text-green"></i> Gastos Agronómicos
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('areas.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('areas.index') }}" wire:navigate>
                    <i class="fas fa-map text-blue"></i> Áreas
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('crop_types.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('crop_types.index') }}" wire:navigate>
                    <i class="fas fa-leaf text-green"></i> Tipos de Cultivos
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('crops.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('crops.index') }}" wire:navigate>
                    <i class="fas fa-seedling text-green"></i> Cultivos
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('customers.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('customers.index') }}" wire:navigate>
                    <i class="fas fa-users text-blue"></i> Clientes
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('employees.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('employees.index') }}" wire:navigate>
                    <i class="fas fa-user-tie text-blue"></i> Empleados
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('farms.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('farms.index') }}" wire:navigate>
                    <i class="fas fa-tractor text-green"></i> Fincas
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('harvests.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('harvests.index') }}" wire:navigate>
                    <i class="fas fa-wheat-awn text-yellow"></i> Cosechas
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('insecticides.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('insecticides.index') }}" wire:navigate>
                    <i class="fas fa-bug text-red"></i> Insecticidas
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('owners.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('owners.index') }}" wire:navigate>
                    <i class="fas fa-user text-blue"></i> Propietarios
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('post_harvests.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('post_harvests.index') }}" wire:navigate>
                    <i class="fas fa-box text-gray"></i> Post Cosecha
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('preparations.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('preparations.index') }}" wire:navigate>
                    <i class="fas fa-cogs text-gray"></i> Preparaciones
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('productions.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('productions.index') }}" wire:navigate>
                    <i class="fas fa-industry text-purple"></i> Producciones
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('property_types.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('property_types.index') }}" wire:navigate>
                    <i class="fas fa-home text-blue"></i> Tipos de Propietarios
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('sales.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('sales.index') }}" wire:navigate>
                    <i class="fas fa-cash-register text-green"></i> Ventas
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('sowings.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('sowings.index') }}" wire:navigate>
                    <i class="fas fa-seedling text-green"></i> Siembras
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt text-gray"></i> Cerrar Sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
</div>


