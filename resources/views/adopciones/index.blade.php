@extends('layouts.app')

@section('content')
<h1>Listado de Adopciones</h1>
<a href="{{ route('adopciones.create') }}" class="btn btn-primary mb-3">Registrar Adopción</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Mascota</th>
            <th>Adoptante</th>
            <th>Fecha de Adopción</th>
            <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($adopciones as $a)
        <tr>
            <td>{{ $a->mascota->nombre_mascota ?? '-' }}</td>
            <td>{{ $a->adoptante->nombre ?? '-' }}</td>
            <td>{{ $a->fecha_adopcion }}</td>
            <td>{{ $a->observaciones }}</td>
            <td>
                <a href="{{ route('adopciones.edit', $a) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('adopciones.destroy', $a) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar esta adopción?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $adopciones->links() }}
@endsection
