@extends('layouts.app')

@section('content')
    <h1>Adoptantes</h1>
    <a href="{{ route('adoptantes.create') }}" class="btn btn-primary mb-3">Crear Adoptante</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Edad</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adoptantes as $adoptante)
                <tr>
                    <td>{{ $adoptante->id }}</td>
                    <td>{{ $adoptante->nombre }}</td>
                    <td>{{ $adoptante->email }}</td>
                    <td>{{ $adoptante->telefono }}</td>
                    <td>{{ $adoptante->direccion }}</td>
                    <td>{{ $adoptante->edad }}</td>
                    <td>{{ $adoptante->observaciones }}</td>
                    <td>
                        <a href="{{ route('adoptantes.edit', $adoptante->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('adoptantes.destroy', $adoptante->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Seguro que quieres eliminar este adoptante?')" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $adoptantes->links() }}
@endsection
