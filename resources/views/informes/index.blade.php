@extends('layouts.app')

@section('title', 'Informes Generales')

@section('content')
    <div class="informe-wrapper">
        <h1 class="text-2xl font-bold text-center my-4">Informes Generales</h1>
<br>
<div class="informes-container">
    <center>
    <a href="{{ route('donaciones.pdf') }}" class="informe-btn" download>
        🤝 Informe de Donaciones
    </a>
    <br>
    <a href="{{ route('adoptantes.pdf') }}" class="informe-btn" download>
        👤 Informe de Adoptantes
    </a>
    <br>
    <a href="{{ route('mascotas.pdf') }}" class="informe-btn" download>
        🐾 Informe de Mascotas
    </a>
    <br>
    <a href="{{ route('adopciones.pdf') }}" class="informe-btn" download>
        📝 Informe de Adopciones
    </a>
    <br>
    <a href="{{ route('historia_clinica.pdf') }}" class="informe-btn" download>
        🩺 Informe de Historias Clínicas
    </a>
</center>
</div>

    </div>
    
@endsection
