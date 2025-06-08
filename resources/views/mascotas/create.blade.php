<form action="{{ route('mascotas.store') }}" method="POST">
    @csrf
    @include('mascotas.form', [
        'razas' => $razas,
        'condiciones' => $condiciones,
        'estados' => $estados
    ])
</form>
