@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Usuarios del Sistema</h1>

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
        Crear Nuevo Usuario
    </a>

    @if ($users->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <img src="{{ $user->image() }}" alt="Profile" style="width: 50px; height: 50px; border-radius: 50%;">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.show', $user) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            {{-- No se puede eliminar al usuario logueado --}}
                            @if (Auth::id() !== $user->id)
                                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar a este usuario?')">Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $users->links() }} --}}

    @else
        <p class="alert alert-info">No hay usuarios registrados.</p>
    @endif
</div>
@endsection