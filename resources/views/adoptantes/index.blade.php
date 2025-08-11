@extends('layouts.app')

@section('title', 'Adoptantes')
@section('content')
<h1>Listado de Adoptantes</h1>

<a href="{{ route('adoptantes.create') }}" class="boton">Registrar Adoptante</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="listado2">
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Edad</th>
            <th>Documento</th>
            <th>Tipo Documento</th>
            <th>Correo</th>
            <th>Sexo</th>
            <th>Localidad</th>
            <th>Barrio</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($adoptantes as $adoptante)
            <tr>
                <td>{{ $adoptante->nombres }}</td>
                <td>{{ $adoptante->telefono }}</td>
                <td>{{ $adoptante->direccion }}</td>
                <td>{{ $adoptante->edad }}</td>
                <td>{{ $adoptante->nro_docum }}</td>
                <td>{{ $adoptante->tipoDocumento->nombre_tipo ?? '-' }}</td>
                <td>{{ $adoptante->correo }}</td>
                <td>{{ $adoptante->sexo }}</td>
                <td>{{ $adoptante->localidad->nombre_localidad ?? '-' }}</td>
                <td>{{ $adoptante->barrio->nombre_barrio ?? $adoptante->barrio_viv }}</td>
                <td>{{ $adoptante->rol }}</td>
                <td>
                    <a href="{{ route('adoptantes.edit', $adoptante) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('adoptantes.destroy', $adoptante) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

{{ $adoptantes->links() }}
@endsection
