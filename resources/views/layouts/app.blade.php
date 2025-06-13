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
                <a href="{{ route('mascotas.index') }}" class="navbar-brand">
                    <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="logo-navbar">
                    Fundación Rescata Amor
                </a>
                <ul class="navbar-nav">
                    <li><a class="{{ request()->routeIs('mascotas.*') ? 'active' : '' }}" href="{{ route('mascotas.index') }}">Mascota</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li><a class="{{ request()->routeIs('historia_clinicas.*') ? 'active' : '' }}" href="{{ route('historia_clinicas.index') }}">Historia clinica</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li><a class="{{ request()->routeIs('galeria.*') ? 'active' : '' }}" href="{{ route('galeria.index') }}">Galeria</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li><a class="{{ request()->routeIs('adopciones.*') ? 'active' : '' }}" href="{{ route('adopciones.index') }}">Adopciones</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container">
        @yield('content')
    </main>
</body>
</html>