@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Rescatado</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('rescatados.update', $rescatado) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $rescatado->nombre }}" required>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" name="edad" id="edad" class="form-control" value="{{ $rescatado->edad }}" required>
            </div>
            
            <div class="mb-3">
                <label for="descripcion_rescate" class="form-label">Descripción</label>
                <textarea name="descripcion_rescate" id="descripcion_rescate" class="form-control" rows="4">{{ $rescatado->descripcion_rescate }}</textarea>
            </div>

            <div class="mb-3">
                <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" value="{{ $rescatado->fecha_ingreso }}" required>
            </div>

            <div class="mb-3">
                <label for="condiciones_especiales" class="form-label">¿Tiene condiciones especiales?</label>
                <select name="condiciones_especiales" id="condiciones_especiales" class="form-select" required>
                    <option value="0" {{ $rescatado->condiciones_especiales ? '' : 'selected' }}>No</option>
                    <option value="1" {{ $rescatado->condiciones_especiales ? 'selected' : '' }}>Sí</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-select" required>
                    <option value="">-- Selecciona Sexo --</option>
                    <option value="Macho" {{ $rescatado->sexo == 'Macho' ? 'selected' : '' }}>Macho</option>
                    <option value="Hembra" {{ $rescatado->sexo == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="Disponible" {{ $rescatado->estado == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="Adoptado" {{ $rescatado->estado == 'Adoptado' ? 'selected' : '' }}>Adoptado</option>
                    <option value="En tratamiento" {{ $rescatado->estado == 'En tratamiento' ? 'selected' : '' }}>En tratamiento</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('rescatados.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
