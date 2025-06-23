@extends('layouts.app')

@section('content')
<h1>Listado de Donaciones</h1>

<a href="{{ route('donaciones.create') }}" class="boton">Registrar Donación</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <th>Adoptante</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($donaciones as $d)
            <tr>
                <td>{{ $d->id_donacion }}</td>
                <td>{{ $d->tipo }}</td>
                <td>{{ $d->cantidad ?? '-' }}</td>
                <td>{{ $d->fecha }}</td>
                <td>{{ $d->adoptante->nombre ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('donaciones.edit', $d) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('donaciones.destroy', $d) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta donación?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $donaciones->links() }}
 
@endsection
