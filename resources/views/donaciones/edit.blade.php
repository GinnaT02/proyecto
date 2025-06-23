@extends('layouts.app')

@section('content')
<h1>Editar Donación</h1>

<form action="{{ route('donaciones.update', $donacion->id_donacion) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Tipo de Donación:</label>
    <input type="text" name="tipo" value="{{ $donacion->tipo }}" required>

    <label>Cantidad:</label>
    <input type="number" step="0.01" name="cantidad" value="{{ $donacion->cantidad }}">

    <label>Fecha:</label>
    <input type="date" name="fecha" value="{{ $donacion->fecha }}" required>

    <label>Adoptante:</label>
    <select name="id_adoptante" required>
        @foreach ($adoptantes as $a)
            <option value="{{ $a->id_adoptante }}" {{ $donacion->id_adoptante == $a->id_adoptante ? 'selected' : '' }}>
                {{ $a->nombres }}
            </option>
        @endforeach
    </select>

    <br><br>
    <button type="submit" class="btn-guardar">Actualizar</button>
</form>
@endsection
