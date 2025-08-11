@extends('layouts.app')

@section('title', 'Galería de Imágenes')
@section('content')
<h1>Listado de Imágenes de la Galería</h1>

<a href="{{ route('galeria.create') }}" class="boton">Registrar Imagen</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID Imagen</th>
            <th>Nombre Mascota</th>
            <th>Nombre Imagen</th>
            <th>Vista Previa</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($imagenes as $img)
            <tr>
                <td>{{ $img->id_imagen }}</td>
                <td>{{ $img->mascota->nombre_mascota ?? 'Sin nombre' }}</td>
                <td>{{ $img->nombre }}</td>
                <td>
                    @if($img->ruta)
                        <img src="{{ asset($img->ruta) }}" alt="Imagen" width="100">
                    @else
                        No disponible
                    @endif
                </td>
                <td>
                    <a href="{{ route('galeria.edit', $img) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('galeria.destroy', $img) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta imagen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $imagenes->links() }}
@endsection
