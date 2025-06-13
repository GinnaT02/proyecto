@extends('layouts.app')

@section('content')
<h1>Editar Imagen de Galería</h1>

<form action="{{ route('galeria.update', $imagen) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Mascota:</label>
    <select name="id_mascota" required>
        @foreach($mascotas as $m)
            <option value="{{ $m->id_mascota }}" {{ $imagen->id_mascota == $m->id_mascota ? 'selected' : '' }}>
                {{ $m->nombre_mascota }}
            </option>
        @endforeach
    </select>

    <label>Nombre de la Imagen:</label>
    <input type="text" name="nombre" value="{{ $imagen->nombre }}" required>

    <label>Ruta:</label>
    <input type="text" name="ruta" value="{{ $imagen->ruta }}" required>

    <br><br>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
