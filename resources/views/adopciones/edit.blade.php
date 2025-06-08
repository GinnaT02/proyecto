@extends('layouts.app')

@section('content')
    <h1>Editar Adopción</h1>
    <form action="{{ route('adopciones.update', $adopcion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="rescatado_id">Animal:</label>
        <select name="rescatado_id" required>
            @foreach ($rescatados as $rescatado)
                <option value="{{ $rescatado->id }}" {{ $rescatado->id == $adopcion->rescatado_id ? 'selected' : '' }}>
                    {{ $rescatado->nombre }}
                </option>
            @endforeach
        </select>

        <label for="adoptante_id">Adoptante:</label>
        <select name="adoptante_id" required>
            @foreach ($adoptantes as $adoptante)
                <option value="{{ $adoptante->id }}" {{ $adoptante->id == $adopcion->adoptante_id ? 'selected' : '' }}>
                    {{ $adoptante->nombre }}
                </option>
            @endforeach
        </select>

        <label for="fecha">Fecha de Adopción:</label>
        <input type="date" name="fecha" value="{{ $adopcion->fecha }}" required>

        <label for="observaciones">Observaciones:</label>
        <textarea name="observaciones">{{ $adopcion->observaciones }}</textarea>

        <button type="submit" class="btn-guardar">Actualizar</button>
    </form>
@endsection
