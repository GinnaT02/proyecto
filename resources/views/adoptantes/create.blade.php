@extends('layouts.app')

@section('content')
<h1>Registrar Adoptante</h1>

<form action="{{ route('adoptantes.store') }}" method="POST">
    @csrf

    <label>Nombre:</label>
    <input type="text" name="nombres" value="{{ old('nombres') }}" required>

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="{{ old('telefono') }}">

    <label>Dirección:</label>
    <input type="text" name="direccion" value="{{ old('direccion') }}">

    <label>Edad:</label>
    <input type="number" name="edad" value="{{ old('edad') }}">

    <label>Nro Documento:</label>
    <input type="number" name="nro_docum" value="{{ old('nro_docum') }}" required>

    <label>Tipo Documento:</label>
    <select name="tipo_docum" required>
        <option value="">Seleccione...</option>
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id_tipo }}">{{ $tipo->nombre_tipo }}</option>
        @endforeach
    </select>

    <label>Correo:</label>
    <input type="email" name="correo" value="{{ old('correo') }}">
    

    <select name="sexo" required> <option value="M">Masculino</option> <option value="F">Femenino</option> </select>

    <label>Localidad:</label>
    <select name="id_localidad" required>
        <option value="">Seleccione...</option>
        @foreach($localidades as $loc)
            <option value="{{ $loc->id_localidad }}">{{ $loc->nombre_localidad }}</option>
        @endforeach
    </select>

    <label>Barrio</label>
    <input type="text" value="{{ old('barrio') }}"></textarea>

    <label>Rol:</label>
    <select name="rol" required>
        <option value="adoptante">Adoptante</option>
        <option value="donante">Donante</option>
        <option value="ambos">Ambos</option>
    </select>

    <br><br>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
