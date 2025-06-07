@extends('layouts.app')

@section('content')
    <h1>Registrar nueva adopción</h1>

    <form action="{{ route('adopciones.store') }}" method="POST">
        @csrf

        <div>
            <label for="rescatado_id">Rescatado:</label><br>
            <select name="rescatado_id" required>
                <option value="">-- Selecciona un rescatado --</option>
                @foreach ($rescatados as $rescatado)
                    <option value="{{ $rescatado->id }}">{{ $rescatado->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-top: 10px;">
            <label for="adoptante_id">Adoptante:</label><br>
            <select name="adoptante_id" required>
                <option value="">-- Selecciona un adoptante --</option>
                @foreach ($adoptantes as $adoptante)
                    <option value="{{ $adoptante->id }}">{{ $adoptante->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-top: 10px;">
            <label for="fecha_adopcion">Fecha de adopción:</label><br>
            <input type="date" name="fecha_adopcion">
        </div>

        <div style="margin-top: 10px;">
            <label for="estado">Estado:</label><br>
            <select name="estado">
                <option value="En proceso">En proceso</option>
                <option value="Completada">Completada</option>
                <option value="Cancelada">Cancelada</option>
            </select>
        </div>

        <div style="margin-top: 10px;">
            <label for="observaciones">Observaciones:</label><br>
            <textarea name="observaciones" rows="4"></textarea>
        </div>

        <div style="margin-top: 15px;">
            <button type="submit">Guardar adopción</button>
        </div>
    </form>
@endsection
