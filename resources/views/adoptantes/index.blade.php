@extends('layouts.app')

@section('content')
<h1>Listado de Adoptantes</h1>

<a href="{{ route('adoptantes.create') }}" class="btn btn-primary mb-3">Registrar Adoptante</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Edad</th>
            <th>Numero Documento</th>
            <th>Tipo Documento</th>
            <th>Correo</th>
            <th>Localidad</th>
            <th>Barrio</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($adoptantes as $adoptante)

<tr> <td>{{ $adoptante->nombre }}</td> <td>{{ $adoptante->telefono }}</td> <td>{{ $adoptante->documento }}</td> <td>{{ $adoptante->direccion }}</td> <td>{{ $adoptante->edad }}</td> <td>{{ $adoptante->numero_documento }}</td> <td>{{ $adoptante->tipoDocumento->descripcion ?? '-' }}</td> <td>{{ $adoptante->correo }}</td> <td>{{ $adoptante->localidad->nombre_localidad ?? '-' }}</td> <td>{{ $adoptante->barrio->nombre_barrio ?? '-' }}</td> <td>{{ $adoptante->rol }}</td> <td> <a href="{{ route('adoptantes.edit', $adoptante) }}" class="btn btn-warning btn-sm">Editar</a> <form action="{{ route('adoptantes.destroy', $adoptante) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?');"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger btn-sm">Eliminar</button> </form> </td> </tr> @endforeach
    </tbody>
</table>

{{ $adoptantes->links() }}
@endsection
