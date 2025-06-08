@extends('layouts.app')

@section('content')
    <h1>Editar Adoptante</h1>
    <form action="{{ route('adoptantes.update', $adoptante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $adoptante->nombre }}" required>

        <label for="tipo_documento_id">Tipo de Documento:</label>
        <select name="tipo_documento_id" required>
            @foreach ($tiposDocumento as $tipo)
                <option value="{{ $tipo->id }}" {{ $tipo->id == $adoptante->tipo_documento_id ? 'selected' : '' }}>
                    {{ $tipo->nombre }}
                </option>
            @endforeach
        </select>

        <label for="numero_documento">Número de Documento:</label>
        <input type="text" name="numero_documento" value="{{ $adoptante->numero_documento }}" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="{{ $adoptante->telefono }}" required>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="{{ $adoptante->direccion }}" required>

        <button type="submit" class="btn-guardar">Actualizar</button>
    </form>
@endsection
