<?php

namespace App\Http\Controllers;

use App\Models\HistoriaClinica;
use App\Models\Rescatado;
use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
    public function index()
    {
        $historias = HistoriaClinica::with('rescatado')->paginate(10);
        return view('historia_clinicas.index', compact('historias'));
    }

    public function create()
    {
       $rescatados = Rescatado::all();
       return view('historia_clinicas.create', compact('rescatados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rescatado_id' => 'required|exists:rescatados,id',
            'fecha_chequeo' => 'required|date',
            'peso' => 'required|numeric',
            'tratamiento' => 'required|string',
            'observaciones' => 'nullable|string',
            'cuidados' => 'nullable|string',
        ]);

        HistoriaClinica::create($request->all());
        return redirect()->route('historia_clinicas.index')->with('success', 'Historia clínica creada.');
    }

    public function edit(HistoriaClinica $historia_clinica)
    {
        $rescatados = Rescatado::all();
        return view('historia_clinicas.edit', compact('historia_clinica', 'rescatados'));
    }

    public function update(Request $request, HistoriaClinica $historia_clinica)
    {
        $request->validate([
            'rescatado_id' => 'required|exists:rescatados,id',
            'fecha_chequeo' => 'required|date',
            'peso' => 'required|numeric',
            'tratamiento' => 'required|string',
            'observaciones' => 'nullable|string',
            'cuidados' => 'nullable|string',
        ]);

        $historia_clinica->update($request->all());
        return redirect()->route('historia_clinicas.index')->with('success', 'Historia clínica actualizada.');
    }

    public function destroy(HistoriaClinica $historia_clinica)
    {
        $historia_clinica->delete();
        return redirect()->route('historia_clinicas.index')->with('success', 'Historia clínica eliminada.');
    }
}
