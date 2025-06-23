@extends('layouts.app')

@section('content')
<h1>Listado de Detalles de Donación</h1>

<a href="{{ route('detalle_donacion.create') }}" class="boton">Registrar Detalle de Donación</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Donación</th>
            <th>Descripción del Producto</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
   
</table>


@endsection
