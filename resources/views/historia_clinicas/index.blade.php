@extends('layouts.app')

@section('content')
@section('title', 'Historias Clínicas')
<h1>Listado de Historias Clínicas</h1>

<a href="{{ route('historia_clinicas.create') }}" class="boton">Registrar Historia Clínica</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Mascota</th>
            <th>Fecha Chequeo</th>
            <th>Peso (kg)</th>
            <th>Tratamiento</th>
            <th>Observaciones</th>
            <th>Cuidados</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($historias as $h)
            <tr>
                <td>{{ $h->id_historia }}</td>
                <td>{{ $h->mascota->nombre_mascota ?? 'Sin nombre' }}</td>
                <td>{{ $h->fecha_chequeo }}</td>
                <td>{{ $h->peso }}</td>
                <td>{{ $h->tratamiento }}</td>
                <td>{{ $h->observaciones ?? '-' }}</td>
                <td>{{ $h->cuidados ?? '-' }}</td>
                <td>
                    <a href="{{ route('historia_clinicas.edit', $h) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('historia_clinicas.destroy', $h) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta historia clínica?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $historias->links() }}
@endsection
