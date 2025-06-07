@extends('layouts.app')
@section('content')
    <h1>Informes</h1>

    <div class="informe">
        <h2>Adoptantes</h2>
        <table class="tablaInformes">
            <thead>
                <tr>
                    <th>Tiempo</th>
                    <th>Cantidad de adoptados</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Adoptados último día</td><td>{{ $adoptadosDia }}</td></tr>
                <tr><td>Adoptados última semana</td><td>{{ $adoptadosSemana }}</td></tr>
                <tr><td>Adoptados último mes</td><td>{{ $adoptadosMes }}</td></tr>
                <tr><td>Adoptados último año</td><td>{{ $adoptadosAnio }}</td></tr>
                <tr><td>Adoptantes con mas de uno</td><td>{{ $adoptantesConMasDeUno }}</td></tr>
            </tbody>
        </table>
    </div>

    <div class="informe">
        <h2>Rescatados</h2>
        <table class="tablaInformes">
            <thead>
                <tr>
                    <th>Tiempo</th>
                    <th>Cantidad de rescatados</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Rescatados último día</td><td>{{ $rescatadosDia }}</td></tr>
                <tr><td>Rescatados última semana</td><td>{{ $rescatadosSemana }}</td></tr>
                <tr><td>Rescatados último mes</td><td>{{ $rescatadosMes }}</td></tr>
                <tr><td>Rescatados último año</td><td>{{ $rescatadosAnio }}</td></tr>
                <tr><td>Rescatados condiciones</td><td>{{ $rescatadosCondiciones }}</td></tr>
            </tbody>
        </table>
    </div>

    <div class="informe">
        <h2>Historias Clínicas</h2>
        <table class="tablaInformes">
            <thead>
                <tr>
                    <th>Rescatado</th>
                    <th>Fecha</th>
                    <th>Tratamiento</th>
                    <th>Observaciones</th>
                    <th>Cuidados</th>
                    <th>Condiciones especiales</th>
                </tr>
            </thead>
            <tbody>
    @foreach($historias as $historia)
        <tr>
            <td>{{ $historia->rescatado->nombre ?? 'N/A' }}</td>
            <td>{{ $historia->created_at->format('d/m/Y') }}</td>
            <td>{{ $historia->tratamiento }}</td>
            <td>{{ $historia->observaciones }}</td>
            <td>{{ $historia->cuidados }}</td>
            <td>{{ $historia->rescatado->condiciones_especiales ? 'Sí' : 'No' }}</td>
        </tr>
    @endforeach
</tbody>
        </table>
    </div>

    <div class="informe">
        <h3>Total Rescatados: {{ $totalRescatados }}</h3>
        <h3>Total Adoptantes: {{ $totalAdoptantes }}</h3>
    </div>
@endsection
