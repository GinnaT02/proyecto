@extends('layouts.app')

@section('content')
    <h1>Editar Historia Clínica</h1>
    <form action="{{ route('historias.update', $historia->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="rescatado_id">Mascota:</label>
        <select name="rescatado_id" required>
            @foreach ($rescatados as $rescatado)
                <option value="{{ $rescatado->id }}" {{ $rescatado->id == $historia->rescatado_id ? 'selected' : '' }}>
                    {{ $rescatado->nombre }}
                </option>
            @endforeach
        </select>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="{{ $historia->fecha }}" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required>{{ $historia->descripcion }}</textarea>

        <label for="veterinario">Veterinario:</label>
        <input type="text" name="veterinario" value="{{ $historia->veterinario }}" required>

        <button type="submit" class="btn-guardar">Actualizar</button>
    </form>
@endsection
