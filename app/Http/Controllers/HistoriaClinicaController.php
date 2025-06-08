<?php

namespace App\Http\Controllers;

use App\Models\HistoriaClinica;
use App\Models\Mascota;
use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
    public function index()
    {
        $historias = HistoriaClinica::with('mascota')->paginate(10);
        return view('historia_clinicas.index', compact('historias'));
    }

    public function create()
    {
        $mascotas = Mascota::all();
        return view('historia_clinica.create', compact('mascotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'sintomas' => 'nullable|string',
            'diagnostico' => 'nullable|string',
            'tratamiento' => 'nullable|string',
            'fecha_consulta' => 'required|date'
        ]);

        HistoriaClinica::create($request->all());
        return redirect()->route('historia-clinica.index')->with('success', 'Registro creado.');
    }

    public function edit(HistoriaClinica $historiaClinica)
    {
        $mascotas = Mascota::all();
        return view('historia_clinica.edit', compact('historiaClinica', 'mascotas'));
    }

    public function update(Request $request, HistoriaClinica $historiaClinica)
    {
        $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'sintomas' => 'nullable|string',
            'diagnostico' => 'nullable|string',
            'tratamiento' => 'nullable|string',
            'fecha_consulta' => 'required|date'
        ]);

        $historiaClinica->update($request->all());
        return redirect()->route('historia-clinica.index')->with('success', 'Registro actualizado.');
    }

    public function destroy(HistoriaClinica $historiaClinica)
    {
        $historiaClinica->delete();
        return redirect()->route('historia-clinica.index')->with('success', 'Registro eliminado.');
    }
}