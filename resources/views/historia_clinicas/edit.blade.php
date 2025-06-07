@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Editar Historia Clínica</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups! Algo salió mal:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('historia_clinicas.update', $historia_clinica->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="rescatado_id" class="form-label">Animal Rescatado</label>
            <select name="rescatado_id" id="rescatado_id" class="form-select" required>
                <option value="">Seleccione un animal</option>
                @foreach($rescatados as $rescatado)
                    <option value="{{ $rescatado->id }}" {{ $historia_clinica->rescatado_id == $rescatado->id ? 'selected' : '' }}>
                        {{ $rescatado->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_chequeo" class="form-label">Fecha de Chequeo</label>
            <input type="date" name="fecha_chequeo" id="fecha_chequeo" class="form-control" value="{{ $historia_clinica->fecha_chequeo }}" required>
        </div>

        <div class="mb-3">
            <label for="peso" class="form-label">Peso (kg)</label>
            <input type="number" name="peso" id="peso" class="form-control" step="0.1" value="{{ $historia_clinica->peso }}" required>
        </div>

        <div class="mb-3">
            <label for="tratamiento" class="form-label">Tratamiento</label>
            <textarea name="tratamiento" id="tratamiento" class="form-control" rows="3" required>{{ $historia_clinica->tratamiento }}</textarea>
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea name="observaciones" id="observaciones" class="form-control" rows="3">{{ $historia_clinica->observaciones }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cuidados" class="form-label">Cuidados</label>
            <textarea name="cuidados" id="cuidados" class="form-control" rows="3">{{ $historia_clinica->cuidados }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Historia Clínica</button>
        <a href="{{ route('historia_clinicas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
