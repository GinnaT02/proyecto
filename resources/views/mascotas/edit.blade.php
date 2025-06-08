@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Mascota</h1>
    <form action="{{ route('mascotas.update', $mascota) }}" method="POST">
        @csrf @method('PUT')
        @include('mascotas.form')
    </form>
</div>
@endsection