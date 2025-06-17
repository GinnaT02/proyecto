@extends('layouts.app')

@section('content')
    <h1>Registrar Adoptante</h1>

    <form action="{{ route('adoptantes.store') }}" method="POST">
        @csrf

        <label for="nombres">Nombre:</label>
        <input type="text" id="nombres" name="nombres" class="input-estandar" value="{{ old('nombres') }}" required>

        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono" class="input-estandar" value="{{ old('telefono') }}" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" class="input-estandar" value="{{ old('direccion') }}">

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" class="input-estandar" value="{{ old('edad') }}">

        <label for="nro_docum">Nro Documento:</label>
        <input type="number" id="nro_docum" name="nro_docum" class="input-estandar" value="{{ old('nro_docum') }}" required>

        <label for="id_tipo">Tipo Documento:</label>
        <select id="id_tipo" name="id_tipo" class="input-estandar" required>
            <option value="">Seleccione...</option>
            @foreach($tipos as $tipo)
                <option value="{{ $tipo->id_tipo }}" {{ old('id_tipo') == $tipo->id_tipo ? 'selected' : '' }}>
                    {{ $tipo->nombre_tipo }}
                </option>
            @endforeach
        </select>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" class="input-estandar" value="{{ old('correo') }}" required>

        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" class="input-estandar" required>
            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
            <option value="Otro" {{ old('sexo') == 'Otro' ? 'selected' : '' }}>Otro</option>
        </select>

        <label for="id_localidad">Localidad:</label>
        <select id="id_localidad" name="id_localidad" class="input-estandar" required>
            <option value="">Seleccione...</option>
            @foreach($localidades as $loc)
                <option value="{{ $loc->id_localidad }}" {{ old('id_localidad') == $loc->id_localidad ? 'selected' : '' }}>
                    {{ $loc->nombre_localidad }}
                </option>
            @endforeach
        </select>

        <label>Barrio:</label>
<input type="text" name="barrio_viv" value="{{ old('barrio_viv', $adoptante->barrio->nombre_barrio ?? '') }}" required>


        <label for="rol">Rol:</label>
        <select id="rol" name="rol" class="input-estandar" required>
            <option value="adoptante" {{ old('rol') == 'adoptante' ? 'selected' : '' }}>Adoptante</option>
            <option value="donante" {{ old('rol') == 'donante' ? 'selected' : '' }}>Donante</option>
            <option value="ambos" {{ old('rol') == 'ambos' ? 'selected' : '' }}>Ambos</option>
        </select>

        <br><br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
