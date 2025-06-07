<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fundación Rescata Amor</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="{{ route('rescatados.index') }}" class="navbar-brand">
                    <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="logo-navbar">
                    Fundación Rescata Amor
                </a>
                <ul class="navbar-nav">
                    <li><a class="{{ request()->routeIs('rescatados.*') ? 'active' : '' }}" href="{{ route('rescatados.index') }}">Rescatados</a></li>
                    <li><a class="{{ request()->routeIs('historia_clinicas.*') ? 'active' : '' }}" href="{{ route('historia_clinicas.index') }}">Historias clínicas</a></li>
                    <li><a class="{{ request()->routeIs('adoptantes.*') ? 'active' : '' }}" href="{{ route('adoptantes.index') }}">Adoptantes</a></li>
                    <li><a class="{{ request()->routeIs('adopciones.*') ? 'active' : '' }}" href="{{ route('adopciones.index') }}">Adopciones</a></li>
                    <li><a class="{{ request()->routeIs('informes.*') ? 'active' : '' }}" href="{{ route('informes.index') }}">Informes</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container">
        @yield('content')
    </main>
</body>
</html>