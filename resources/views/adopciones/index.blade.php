@extends('layouts.app')

@section('content')
    <h1>Listado de Adopciones</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('adopciones.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">Nueva Adopción</a>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rescatado</th>
                <th>Adoptante</th>
                <th>Fecha de adopción</th>
                <th>Estado</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($adopciones as $adopcion)
                <tr>
                    <td>{{ $adopcion->id }}</td>
                    <td>{{ $adopcion->rescatado->nombre ?? 'N/A' }}</td>
                    <td>{{ $adopcion->adoptante->nombre ?? 'N/A' }}</td>
                    <td>{{ $adopcion->fecha_adopcion ?? 'Sin fecha' }}</td>
                    <td>{{ $adopcion->estado }}</td>
                    <td>{{ $adopcion->observaciones ?? '-' }}</td>
                    <td>
                        <a href="{{ route('adopciones.edit', $adopcion->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('adopciones.destroy', $adopcion->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que quieres eliminar esta adopción?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">No hay adopciones registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
