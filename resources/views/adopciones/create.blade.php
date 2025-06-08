@extends('layouts.app')

@section('content')
    <h1>Registrar Adopción</h1>
    <form action="{{ route('adopciones.store') }}" method="POST">
        @csrf
        <label for="rescatado_id">Animal:</label>
        <select name="rescatado_id" required>
            @foreach ($rescatados as $rescatado)
                <option value="{{ $rescatado->id }}">{{ $rescatado->nombre }}</option>
            @endforeach
        </select>

        <label for="adoptante_id">Adoptante:</label>
        <select name="adoptante_id" required>
            @foreach ($adoptantes as $adoptante)
                <option value="{{ $adoptante->id }}">{{ $adoptante->nombre }}</option>
            @endforeach
        </select>

        <label for="fecha">Fecha de Adopción:</label>
        <input type="date" name="fecha" required>

        <label for="observaciones">Observaciones:</label>
        <textarea name="observaciones"></textarea>

        <button type="submit" class="btn-guardar">Guardar</button>
    </form>
@endsection
