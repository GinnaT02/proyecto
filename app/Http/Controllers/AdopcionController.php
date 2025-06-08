<?php

namespace App\Http\Controllers;

use App\Models\Adopcion;
use App\Models\Adoptante;
use App\Models\Mascota;
use Illuminate\Http\Request;

class AdopcionController extends Controller
{
    public function index()
    {
        $adopciones = Adopcion::with(['mascota', 'adoptante'])->paginate(10);
        return view('adopciones.index', compact('adopciones'));
    }

    public function create()
    {
        $adoptantes = Adoptante::all();
        $mascotas = Mascota::all();
        return view('adopciones.create', compact('adoptantes', 'mascotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'adoptante_id' => 'required|exists:adoptantes,id',
            'mascota_id' => 'required|exists:mascotas,id',
            'fecha_adopcion' => 'required|date'
        ]);

        Adopcion::create($request->all());
        return redirect()->route('adopciones.index')->with('success', 'Adopción registrada correctamente.');
    }

    public function edit(Adopcion $adopcion)
    {
        $adoptantes = Adoptante::all();
        $mascotas = Mascota::all();
        return view('adopciones.edit', compact('adopcion', 'adoptantes', 'mascotas'));
    }

    public function update(Request $request, Adopcion $adopcion)
    {
        $request->validate([
            'adoptante_id' => 'required|exists:adoptantes,id',
            'mascota_id' => 'required|exists:mascotas,id',
            'fecha_adopcion' => 'required|date'
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