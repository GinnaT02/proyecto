@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Crear Rescatado</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('rescatados.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" name="edad" id="edad" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descripcion_rescate" class="form-label">Descripción</label>
                <textarea name="descripcion_rescate" id="descripcion_rescate" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="condiciones_especiales" class="form-label">¿Tiene condiciones especiales?</label>
                <select name="condiciones_especiales" id="condiciones_especiales" class="form-select" required>
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-select" required>
                    <option value="">-- Selecciona Sexo --</option>
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="Disponible">Disponible</option>
                    <option value="Adoptado">Adoptado</option>
                    <option value="En tratamiento">En tratamiento</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('rescatados.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
