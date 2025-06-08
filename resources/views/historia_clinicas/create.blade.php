@extends('layouts.app')

@section('content')
    <h1>Agregar Historia Clínica</h1>
    <form action="{{ route('historias.store') }}" method="POST">
        @csrf

        <label for="rescatado_id">Mascota:</label>
        <select name="rescatado_id" required>
            @foreach ($rescatados as $rescatado)
                <option value="{{ $rescatado->id }}">{{ $rescatado->nombre }}</option>
            @endforeach
        </select>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea>

        <label for="veterinario">Veterinario:</label>
        <input type="text" name="veterinario" required>

        <button type="submit" class="btn-guardar">Guardar</button>
    </form>
@endsection
