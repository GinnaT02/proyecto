<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fundación de Mascotas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS de DataTables sin Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    {{-- Tu CSS personalizado --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <header>
        <h1>Fundación de Mascotas</h1>
    </header>

    <nav>
        <a href="{{ route('mascotas.index') }}">Mascotas</a>
        <a href="{{ route('adoptantes.index') }}">Adoptantes</a>
        <a href="{{ route('adopciones.index') }}">Adopciones</a>
        <a href="{{ route('historia_clinicas.index') }}">Historias Clínicas</a>
        <a href="{{ route('galeria.index') }}">Galería</a>
    </nav>

    <main>
        @yield('content')
    </main>

    {{-- jQuery y DataTables --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('table').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                }
            });
        });
    </script>

</body>
</html>
        