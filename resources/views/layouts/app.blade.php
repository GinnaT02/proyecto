<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Fundación de Mascotas')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">Fundación</div>
            <nav>
                <a href="{{ route('mascotas.index') }}" class="nav-link">🐾 Mascotas</a>
                <a href="{{ route('adoptantes.index') }}" class="nav-link">👤 Adoptantes</a>
                <a href="{{ route('adopciones.index') }}" class="nav-link">📄 Adopciones</a>
                <a href="{{ route('historia_clinicas.index') }}" class="nav-link">🩺 Historias Clínicas</a>
                <a href="{{ route('galeria.index') }}" class="nav-link">🖼️ Galería</a>
                <a href="{{ route('donaciones.index') }}" class="nav-link">🤝 Donaciones</a>
                <a href="{{ route('detalle_donacion.index') }}" class="nav-link">🤝 Detalle donacion</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="content">
           
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('table').DataTable({
                scrollX: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                }
            });
        });
    </script>
</body>
</html>
