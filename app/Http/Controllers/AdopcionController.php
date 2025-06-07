<?php

namespace App\Http\Controllers;

use App\Models\Adopcion;
use App\Models\Rescatado;
use App\Models\Adoptante;
use Illuminate\Http\Request;

class AdopcionController extends Controller
{
    public function index()
    {
        $adopciones = Adopcion::with(['rescatado', 'adoptante'])->get();
        return view('adopciones.index', compact('adopciones'));
    }

    public function create()
    {
        $rescatados = Rescatado::all();
        $adoptantes = Adoptante::all();
        return view('adopciones.create', compact('rescatados', 'adoptantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rescatado_id' => 'required|exists:rescatados,id',
            'adoptante_id' => 'required|exists:adoptantes,id',
            'fecha_adopcion' => 'nullable|date',
            'estado' => 'required|string',
            'observaciones' => 'nullable|string',
        ]);

        Adopcion::create($request->all());

        return redirect()->route('adopciones.index')->with('success', 'Adopción registrada correctamente.');
    }

    public function edit(Adopcion $adopcion)
    {
        $rescatados = Rescatado::all();
        $adoptantes = Adoptante::all();
        return view('adopciones.edit', compact('adopcion', 'rescatados', 'adoptantes'));
    }

    public function update(Request $request, Adopcion $adopcion)
    {
        $request->validate([
            'rescatado_id' => 'required|exists:rescatados,id',
            'adoptante_id' => 'required|exists:adoptantes,id',
            'fecha_adopcion' => 'nullable|date',
            'estado' => 'required|string',
            'observaciones' => 'nullable|string',
        ]);

        $adopcion->update($request->all());

        return redirect()->route('adopciones.index')->with('success', 'Adopción actualizada correctamente.');
    }

    public function destroy(Adopcion $adopcion)
    {
        $adopcion->delete();
        return redirect()->route('adopciones.index')->with('success', 'Adopción eliminada.');
    }
}
