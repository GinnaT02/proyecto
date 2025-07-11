@extends('layouts.app')

@section('content')
    <h1>Listado de Donaciones</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('donaciones.create') }}" class="boton">Nueva Donación</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Adoptante</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donaciones as $donacion)
                @php $det = $donacion->detalles->first(); @endphp
                <tr>
                    <td>{{ $donacion->id_donacion }}</td>
                    <td>{{ $donacion->tipo }}</td>
                    <td>{{ $donacion->cantidad }}</td>
                    <td>{{ $donacion->fecha }}</td>
                    <td>{{ $donacion->adoptante->nombres ?? 'N/A' }}</td>
                    <td>{{ $det->descripcion_producto ?? '-' }}</td>
                    <td>
                        <a href="{{ route('donaciones.edit', $donacion->id_donacion) }}" class="btn btn-warning btn-sm  ">Editar</a>
                        <form action="{{ route('donaciones.destroy', $donacion->id_donacion) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta donación?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
