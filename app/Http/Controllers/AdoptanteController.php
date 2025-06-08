<?php

namespace App\Http\Controllers;

use App\Models\Adoptante;
use Illuminate\Http\Request;

class AdoptanteController extends Controller
{
    public function index()
    {
        $adoptantes = Adoptante::paginate(10);
        return view('adoptantes.index', compact('adoptantes'));
    }

    public function create()
    {
        return view('adoptantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'correo' => 'nullable|email',
            'direccion' => 'nullable|string|max:255'
        ]);

        Adoptante::create($request->all());
        return redirect()->route('adoptantes.index')->with('success', 'Adoptante registrado correctamente.');
    }

    public function edit(Adoptante $adoptante)
    {
        return view('adoptantes.edit', compact('adoptante'));
    }

    public function update(Request $request, Adoptante $adoptante)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'correo' => 'nullable|email',
            'direccion' => 'nullable|string|max:255'
        ]);

        $adoptante->update($request->all());
        return redirect()->route('adoptantes.index')->with('success', 'Adoptante actualizado.');
    }

    public function destroy(Adoptante $adoptante)
    {
        $adoptante->delete();
        return redirect()->route('adoptantes.index')->with('success', 'Adoptante eliminado.');
    }
}