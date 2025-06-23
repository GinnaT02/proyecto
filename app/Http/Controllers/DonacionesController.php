<?php

namespace App\Http\Controllers;

use App\Models\Donacion;
use App\Models\Adoptante;
use Illuminate\Http\Request;

class DonacionesController extends Controller
{
    public function index()
    {
        $donaciones = Donacion::with('adoptante')->paginate(10);
        return view('donaciones.index', compact('donaciones'));
    }

    public function create()
    {
        $adoptantes = Adoptante::all();
        return view('donaciones.create', compact('adoptantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'cantidad' => 'nullable|numeric',
            'fecha' => 'required|date',
            'id_adoptante' => 'required|exists:adoptantes,id_adoptante',
        ]);

        Donacion::create($request->all());

        return redirect()->route('donaciones.index')->with('success', 'Donación registrada correctamente.');
    }

    public function edit(Donacion $donacion)
    {
        $adoptantes = Adoptante::all();
        return view('donaciones.edit', compact('donacion', 'adoptantes'));
    }

    public function update(Request $request, Donacion $donacion)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'cantidad' => 'nullable|numeric',
            'fecha' => 'required|date',
            'id_adoptante' => 'required|exists:adoptantes,id_adoptante',
        ]);

        $donacion->update($request->all());

        return redirect()->route('donaciones.index')->with('success', 'Donación actualizada correctamente.');
    }

    public function destroy(Donacion $donacion)
    {
        $donacion->delete();
        return redirect()->route('donaciones.index')->with('success', 'Donación eliminada correctamente.');
    }
}
