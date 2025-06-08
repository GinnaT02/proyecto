@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Mascota</h1>
    <form action="{{ route('mascotas.store') }}" method="POST">
        @csrf
        @include('mascotas.form')
    </form>
</div>
@endsection