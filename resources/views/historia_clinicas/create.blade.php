@extends('layouts.app')
@section('content')
    <h1>Crear Historia Clínica</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error) 
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('historia_clinicas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="rescatado_id" class="form-label">Animal (Rescatado)</label>
            <select name="rescatado_id" id="rescatado_id" class="form-select" required>
                <option value="">Seleccione un rescatado</option>
                @foreach($rescatados as $rescatado)
                    <option value="{{ $rescatado->id }}" {{ old('rescatado_id') == $rescatado->id ? 'selected' : '' }}>
                        {{ $rescatado->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_chequeo" class="form-label">Fecha de Chequeo</label>
            <input type="date" name="fecha_chequeo" id="fecha_chequeo" class="form-control" value="{{ old('fecha_chequeo') }}" required>
        </div>

        <div class="mb-3">
            <label for="peso" class="form-label">Peso (kg)</label>
            <input type="number" step="0.01" name="peso" id="peso" class="form-control" value="{{ old('peso') }}" required>
        </div>

        <div class="mb-3">
            <label for="tratamiento" class="form-label">Tratamiento</label>
            <textarea name="tratamiento" id="tratamiento" class="form-control" rows="2" required>{{ old('tratamiento') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea name="observaciones" id="observaciones" class="form-control" rows="2">{{ old('observaciones') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cuidados" class="form-label">Cuidados</label>
            <textarea name="cuidados" id="cuidados" class="form-control" rows="2">{{ old('cuidados') }}</textarea>
        </div>

        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{ route('historia_clinicas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
