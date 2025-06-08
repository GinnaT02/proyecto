@extends('layouts.app')

@section('content')
    <h1>Listado de Adoptantes</h1>
    <a href="{{ route('adoptantes.create') }}" class="btn-agregar">Agregar Adoptante</a>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo de Documento</th>
                <th>Número</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adoptantes as $adoptante)
                <tr>
                    <td>{{ $adoptante->nombre }}</td>
                    <td>{{ $adoptante->tipoDocumento->nombre }}</td>
                    <td>{{ $adoptante->numero_documento }}</td>
                    <td>{{ $adoptante->telefono }}</td>
                    <td>{{ $adoptante->direccion }}</td>
                    <td>
                        <a href="{{ route('adoptantes.edit', $adoptante->id) }}" class="btn-editar">Editar</a>
                        <form action="{{ route('adoptantes.destroy', $adoptante->id) }}" method="POST" class="form-eliminar">
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
