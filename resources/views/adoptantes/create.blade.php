@extends('layouts.app')

@section('content')
    <h1>Crear Adoptante</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error) 
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('adoptantes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $adoptante->nombre ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}">
        </div>

        <div class="mb-3">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}">
        </div>

        <div class="mb-3">
            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad" value="{{ old('edad') }}">
        </div>

        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" id="observaciones">{{ old('observaciones') }}</textarea>
        </div>

        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{ route('adoptantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
