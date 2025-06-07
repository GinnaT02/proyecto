<?php

namespace App\Http\Controllers;

use App\Models\Adoptante;
use Illuminate\Http\Request;

class AdoptanteController extends Controller
{
    public function index()
    {
        // Pagina los adoptantes de 10 en 10
        $adoptantes = Adoptante::with('rescatado')->paginate(10);
        return view('adoptantes.index', compact('adoptantes'));
    }

    public function create()
    {
        return view('adoptantes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'edad' => 'nullable|integer|min:0',
            'observaciones' => 'nullable|string',
        ]);

        Adoptante::create($validated);

        return redirect()->route('adoptantes.index')->with('success', 'Adoptante creado correctamente.');
    }

    public function edit(Adoptante $adoptante)
    {
        return view('adoptantes.edit', compact('adoptante'));
    }

    public function update(Request $request, Adoptante $adoptante)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'edad' => 'nullable|integer|min:0',
            'observaciones' => 'nullable|string',
        ]);

        $adoptante->update($validated);

        return redirect()->route('adoptantes.index')->with('success', 'Adoptante actualizado correctamente.');
    }

    public function destroy(Adoptante $adoptante)
    {
        $adoptante->delete();

        return redirect()->route('adoptantes.index')->with('success', 'Adoptante eliminado correctamente.');
    }
}
