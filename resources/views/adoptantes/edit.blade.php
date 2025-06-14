@extends('layouts.app')

@section('content')
<h1>Editar Adoptante</h1>

<form action="{{ route('adoptantes.update', $adoptante) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre:</label>
    <input type="text" name="nombres" value="{{ old('nombres', $adoptante->nombres) }}" required>

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="{{ old('telefono', $adoptante->telefono) }}">

    <label>Dirección:</label>
    <input type="text" name="direccion" value="{{ old('direccion', $adoptante->direccion) }}">

    <label>Edad:</label>
    <input type="number" name="edad" value="{{ old('edad', $adoptante->edad) }}">

    <label>Nro Documento:</label>
    <input type="number" name="nro_docum" value="{{ old('nro_docum', $adoptante->nro_docum) }}" required>

    <label>Tipo Documento:</label>
    <select name="tipo_docum" required>
        <option value="">Seleccione...</option>
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id_tipo }}" {{ $adoptante->tipo_docum == $tipo->id_tipo ? 'selected' : '' }}>
                {{ $tipo->nombre_tipo }}
            </option>
        @endforeach
    </select>

    <label>Correo:</label>
    <input type="email" name="correo" value="{{ old('correo', $adoptante->correo) }}">

    <label>Sexo:</label>
    <input type="text" name="sexo" value="{{ old('sexo', $adoptante->sexo) }}">

    <label>Localidad:</label>
    <select name="id_localidad" required>
        @foreach($localidades as $loc)
            <option value="{{ $loc->id_localidad }}" {{ $adoptante->id_localidad == $loc->id_localidad ? 'selected' : '' }}>
                {{ $loc->nombre_localidad }}
            </option>
        @endforeach
    </select>

    <label>Barrio:</label>
    <select name="barrio_viv" required>
        @foreach($barrios as $b)
            <option value="{{ $b->id_barrio }}" {{ $adoptante->barrio_viv == $b->id_barrio ? 'selected' : '' }}>
                {{ $b->nombre_barrio }}
            </option>
        @endforeach
    </select>

    <label>Rol:</label>
    <select name="rol" required>
        <option value="adoptante" {{ $adoptante->rol == 'adoptante' ? 'selected' : '' }}>Adoptante</option>
        <option value="donante" {{ $adoptante->rol == 'donante' ? 'selected' : '' }}>Donante</option>
        <option value="ambos" {{ $adoptante->rol == 'ambos' ? 'selected' : '' }}>Ambos</option>
    </select>

    <br><br>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
