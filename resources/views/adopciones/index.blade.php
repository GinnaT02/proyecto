@extends('layouts.app')

@section('content')
    <h1>Listado de Adopciones</h1>
    <a href="{{ route('adopciones.create') }}" class="btn-agregar">Registrar Adopción</a>
    <table>
        <thead>
            <tr>
                <th>Adoptante</th>
                <th>Animal</th>
                <th>Fecha de Adopción</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adopciones as $adopcion)
                <tr>
                    <td>{{ $adopcion->adoptante->nombre }}</td>
                    <td>{{ $adopcion->rescatado->nombre }}</td>
                    <td>{{ $adopcion->fecha }}</td>
                    <td>{{ $adopcion->observaciones }}</td>
                    <td>
                        <a href="{{ route('adopciones.edit', $adopcion->id) }}" class="btn-editar">Editar</a>
                        <form action="{{ route('adopciones.destroy', $adopcion->id) }}" method="POST" class="form-eliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
