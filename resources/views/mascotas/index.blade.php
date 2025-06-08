@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Mascotas</h1>
    <a href="{{ route('mascotas.create') }}" class="btn btn-primary mb-3">Registrar Nueva Mascota</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mascotas as $mascota)
                <tr>
                    <td>{{ $mascota->nombre }}</td>
                    <td>{{ $mascota->edad }}</td>
                    <td>{{ $mascota->genero }}</td>
                    <td>
                        <a href="{{ route('mascotas.show', $mascota) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('mascotas.edit', $mascota) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection