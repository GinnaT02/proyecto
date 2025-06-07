<?php

namespace App\Http\Controllers;

use App\Models\Rescatado;
use App\Models\Adoptante;
use App\Models\HistoriaClinica;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class InformeController extends Controller
{
    public function index()
    {
        $totalRescatados = Rescatado::count();
        $totalAdoptantes = Adoptante::count();

        $adoptadosDia = Rescatado::whereNotNull('adoptante_id')->where('created_at', '>=', now()->subDay())->count();
        $adoptadosSemana = Rescatado::whereNotNull('adoptante_id')->where('created_at', '>=', now()->subWeek())->count();
        $adoptadosMes = Rescatado::whereNotNull('adoptante_id')->where('created_at', '>=', now()->subMonth())->count();
        $adoptadosAnio = Rescatado::whereNotNull('adoptante_id')->where('created_at', '>=', now()->subYear())->count();
        $adoptantesConMasDeUno = Rescatado::select('adoptante_id')
            ->whereNotNull('adoptante_id')
            ->groupBy('adoptante_id')
            ->havingRaw('COUNT(*) > 1')
            ->count();

        $rescatadosDia = Rescatado::where('created_at', '>=', now()->subDay())->count();
        $rescatadosSemana = Rescatado::where('created_at', '>=', now()->subWeek())->count();
        $rescatadosMes = Rescatado::where('created_at', '>=', now()->subMonth())->count();
        $rescatadosAnio = Rescatado::where('created_at', '>=', now()->subYear())->count();
        $rescatadosCondiciones = Rescatado::where('condiciones_especiales', true)->count();
        $historias = HistoriaClinica::with('rescatado')->orderBy('created_at', 'desc')->get();

        return view('informes.index', compact(
            'totalRescatados',
            'totalAdoptantes',
            'adoptadosDia',
            'adoptadosSemana',
            'adoptadosMes',
            'adoptadosAnio',
            'adoptantesConMasDeUno',
            'rescatadosDia',
            'rescatadosSemana',
            'rescatadosMes',
            'rescatadosAnio',
            'rescatadosCondiciones',
            'historias'
        ));
    }
}
