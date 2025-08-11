@extends('layouts.app')

@section('title', 'Mascotas')
@section('content')
<h1>Listado de Mascotas</h1>
<a href="{{ route('mascotas.create') }}" class="boton">Registrar Mascota</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="tabla-scroll">
<table class="table" id="miTabla">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Género</th>
            <th>Vacunado</th>
            <th>Peligroso</th>
            <th>Esterilizado</th>
            <th>Destetado</th>
            <th>Crianza</th>
            <th>Condiciones Especiales</th>
            <th>Condición</th>
            <th>Estado</th>
            <th>Raza</th>
            <th>Fecha de Ingreso</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mascotas as $m)
            <tr>
                <td>
                    @if($m->imagen)
                        <img src="{{ asset('storage/' . $m->imagen) }}" alt="Imagen" style="width: 80px; height: auto;">
                    @else
                        Sin imagen
                    @endif
                </td>
                <td>{{ $m->nombre_mascota }}</td>
                <td>{{ $m->edad }}</td>
                <td>{{ $m->genero }}</td>
                <td>{{ $m->vacunado ? 'Sí' : 'No' }}</td>
                <td>{{ $m->peligroso ? 'Sí' : 'No' }}</td>
                <td>{{ $m->esterilizado ? 'Sí' : 'No' }}</td>
                <td>{{ $m->destetado ? 'Sí' : 'No' }}</td>
                <td>{{ $m->crianza ? 'Sí' : 'No' }}</td>
                <td>{{ $m->condiciones_especiales ? 'Sí' : 'No' }}</td>
                <td>{{ $m->condicion->descripcion ?? 'Ninguna' }}</td>
                <td>{{ $m->estado->descripcion ?? '-' }}</td>
                <td>{{ $m->raza->nombre_raza ?? '-' }}</td>
                <td>{{ $m->fecha_ingreso }}</td>
                <td>
                    <a href="{{ route('mascotas.edit', $m) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('mascotas.destroy', $m) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?');">
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
{{ $mascotas->links() }}
@endsection