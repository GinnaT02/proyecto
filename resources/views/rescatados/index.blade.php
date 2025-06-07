@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Rescatados</h1>
        <a href="{{ route('rescatados.create') }}" class="btn btn-primary">Nuevo Rescatado</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($rescatados->isEmpty())
        <p>No hay animales rescatados registrados.</p>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Descripción Rescate</th>
                    <th>Fecha de Ingreso</th>
                    <th>Cond. Especiales</th>
                    <th>Sexo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rescatados as $rescatado)
                    <tr>
                        <td>{{ $rescatado->nombre }}</td>
                        <td>{{ $rescatado->edad }}</td>
                        <td>{{ $rescatado->descripcion_rescate ?? 'N/A' }}</td>
                        <td>{{ $rescatado->fecha_ingreso }}</td>
                        <td>{{ $rescatado->condiciones_especiales ? 'Sí' : 'No' }}</td>
                        <td>{{ $rescatado->sexo }}</td>
                        <td>{{ $rescatado->estado }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('rescatados.edit', $rescatado) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('rescatados.destroy', $rescatado) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este rescatado?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
