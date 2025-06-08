@extends('layouts.app')

@section('content')
    <h1>Agregar Adoptante</h1>
    <form action="{{ route('adoptantes.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="tipo_documento_id">Tipo de Documento:</label>
        <select name="tipo_documento_id" required>
            @foreach ($tiposDocumento as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
            @endforeach
        </select>

        <label for="numero_documento">Número de Documento:</label>
        <input type="text" name="numero_documento" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" required>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required>

        <button type="submit" class="btn-guardar">Guardar</button>
    </form>
@endsection
