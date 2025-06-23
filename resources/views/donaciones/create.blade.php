@extends('layouts.app')

@section('content')
    <h1>Registrar Donación</h1>

    <form action="{{ route('donaciones.store') }}" method="POST">
        @csrf

        <label for="tipo">Tipo de Donación:</label>
        <input type="text" name="tipo" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" step="0.01" name="cantidad">

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required>

        <label for="id_adoptante">Adoptante:</label>
        <select name="id_adoptante" required>
            @foreach ($adoptantes as $adoptante)
                <option value="{{ $adoptante->id_adoptante }}">{{ $adoptante->nombres }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn-guardar">Guardar</button>
    </form>
@endsection
