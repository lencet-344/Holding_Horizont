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
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main"
                    aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
    <!-- Navigation -->
    <ul class="navbar-nav">
        <li class="nav-item {{ Request::route()->named('dashboard') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('dashboard') ? 'active' : '' }}"
                href="{{ route('dashboard') }}" wire:navigate>
                <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
        </li>
    </ul>
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Panel de Administración</h6>
    <ul class="navbar-nav">
       
    </ul>
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Otras Acciones</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item {{ Request::route()->named('profile.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('profile.index') ? 'active' : '' }}"
                href="{{ route('profile.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Perfil
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt text-gray"></i> Cerrar Sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

       
    </ul>

    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Ejemplos</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">



<li class="nav-item {{ Request::route()->named('Agronomic_expenses.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('Agronomic_expenses.index') ? 'active' : '' }}"
                href="{{ route('Agronomic_expenses.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Gastos Agronómicos
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('areas.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('areas.index') ? 'active' : '' }}"
                href="{{ route('areas.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Áreas
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('Crop_types.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('Crop_types.index') ? 'active' : '' }}"
                href="{{ route('Crop_types.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Tipos de Cultivos
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('crops.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('crops.index') ? 'active' : '' }}"
                href="{{ route('crops.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Cultivos
            </a>
        </li>
    </ul>
</div>
<li class="nav-item {{ Request::route()->named('customers.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('customers.index') ? 'active' : '' }}"
                href="{{ route('customers.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Clientes
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('employees.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('employees.index') ? 'active' : '' }}"
                href="{{ route('employees.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Empleados
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('farms.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('farms.index') ? 'active' : '' }}"
                href="{{ route('farms.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Fincas
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('harvests.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('harvests.index') ? 'active' : '' }}"
                href="{{ route('harvests.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Cosechas
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('insecticides.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('insecticides.index') ? 'active' : '' }}"
                href="{{ route('insecticides.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Innsecticidas
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('owners.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('owners.index') ? 'active' : '' }}"
                href="{{ route('owners.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Propietarios
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('post_harvests.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('post_harvests.index') ? 'active' : '' }}"
                href="{{ route('post_harvests.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Post Cosecha
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('preparations.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('preparations.index') ? 'active' : '' }}"
                href="{{ route('preparations.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Preparaciones
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('productions.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('productions.index') ? 'active' : '' }}"
                href="{{ route('productions.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Producciones
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('property_types.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('property_types.index') ? 'active' : '' }}"
                href="{{ route('property_types.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Tipos de Propietarios
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('sales.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('sales.index') ? 'active' : '' }}"
                href="{{ route('sales.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Ventas
            </a>
        </li>
    </ul>
</div>

<li class="nav-item {{ Request::route()->named('sowings.index') ? 'active' : '' }}">
            <a class="nav-link {{ Request::route()->named('sowings.index') ? 'active' : '' }}"
                href="{{ route('sowings.index') }}" wire:navigate>
                <i class="fas fa-user text-blue"></i> Siembras
            </a>
        </li>
    </ul>
</div>




