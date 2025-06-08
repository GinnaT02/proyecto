@extends('layouts.app')

@section('content')
    <h1>Listado de Historias Clínicas</h1>
    <a href="{{ route('historiaclinicas.create') }}" class="btn-agregar">Agregar Historia</a>
    <table>
        <thead>
            <tr>
                <th>Mascota</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Veterinario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historias as $historia)
                <tr>
                    <td>{{ $historia->rescatado->nombre }}</td>
                    <td>{{ $historia->fecha }}</td>
                    <td>{{ $historia->descripcion }}</td>
                    <td>{{ $historia->veterinario }}</td>
                    <td>
                        <a href="{{ route('historias.edit', $historia->id) }}" class="btn-editar">Editar</a>
                        <form action="{{ route('historias.destroy', $historia->id) }}" method="POST" class="form-eliminar">
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
