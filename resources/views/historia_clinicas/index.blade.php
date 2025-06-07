@extends('layouts.app')
@section('content')
    <h1>Historias Clínicas</h1>
    <a href="{{ route('historia_clinicas.create') }}" class="btn btn-primary mb-3">Crear Historia Clínica</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
    <tr>
        <th>ID</th>
        <th>Rescatado</th>
        <th>Fecha</th>
        <th>Peso</th>
        <th>Tratamiento</th>
        <th>Observaciones</th>
        <th>Cuidados</th>
        <th>Acciones</th>
    </tr>
</thead>
<tbody>
@foreach($historias as $historia)
    <tr>
        <td>{{ $historia->id }}</td>
        <td>{{ $historia->rescatado->nombre }}</td>
        <td>{{ $historia->fecha_chequeo }}</td>
        <td>{{ $historia->peso }} kg</td>
        <td>{{ $historia->tratamiento }}</td>
        <td>{{ $historia->observaciones }}</td>
        <td>{{ $historia->cuidados }}</td>
        <td>
            <a href="{{ route('historia_clinicas.edit', $historia) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('historia_clinicas.destroy', $historia) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('¿Seguro que quieres eliminar?')" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </td>
    </tr>
@endforeach
</tbody>
    </table>
    {{ $historias->links() }}
@endsection
