@extends('layouts.app')

@section('content')
<h1>Registrar Mascota</h1>

<form action="{{ route('mascotas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nombre:</label>
    <input type="text" name="nombre_mascota" required>

    <label>Edad:</label>
    <input type="number" name="edad" required>

    <label>Género:</label>
    <select name="genero" required>
        <option value="Macho">Macho</option>
        <option value="Hembra">Hembra</option>
    </select>

    <label>Vacunado:</label>
    <select name="vacunado" required>
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>

    <label>Peligroso:</label>
    <select name="peligroso" required>
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>

    <label>Esterilizado:</label>
    <select name="esterilizado" required>
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>

    <label>Destetado:</label>
    <select name="destetado" required>
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>

    <label>Raza:</label>
    <input type="text" name="nombre_raza" value="{{ ('nombre_raza', $mascota->raza->nombre_raza ?? '') }}" required>


    <label>Estado:</label>
    <select name="estado_id" required>
        <option value="">-- Seleccione --</option>
        @foreach($estados as $e)
            <option value="{{ $e->id_estado }}">{{ $e->descripcion }}</option>
        @endforeach
    </select>

    <label>Fecha de ingreso:</label>
    <input type="date" name="fecha_ingreso" required>

    <label>Crianza:</label>
    <select name="crianza" required>
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>

    <label>Imagen:</label>
    <input type="file" name="imagen">

    <label>
        <input type="checkbox" name="condiciones_especiales" id="chkCondiciones" value="1"> ¿Tiene condición especial?
    </label>

    <div id="divDescripcion" style="display:none;">
        <label>Descripción de la condición:</label>
        <textarea name="descripcion_condicion"></textarea>
    </div>

    <br><br>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<script>
document.getElementById('chkCondiciones').addEventListener('change', function () {
    document.getElementById('divDescripcion').style.display = this.checked ? 'block' : 'none';
});
</script>
@endsection
