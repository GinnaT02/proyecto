<?php

namespace App\Http\Controllers;

use App\Models\Rescatado;
use App\Models\Adoptante;
use Illuminate\Http\Request;

class RescatadoController extends Controller
{
    public function index()
    {
        $rescatados = Rescatado::with('adoptante')->paginate(10);
        return view('rescatados.index', compact('rescatados'));
    }

    public function create()
    {
        $adoptantes = Adoptante::all();
        return view('rescatados.create', compact('adoptantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'nullable|integer',
            'fecha_ingreso' => 'nullable|date',
            'condiciones_especiales' => 'required|boolean',
            'estado' => 'required|string|max:255',
            'adoptante_id' => 'nullable|exists:adoptantes,id',
            'descripcion' => 'nullable|string',
        ]);

        Rescatado::create($request->all());
        return redirect()->route('rescatados.index')->with('success', 'Rescatado creado correctamente.');
    }

    public function edit(Rescatado $rescatado)
    {
        $adoptantes = Adoptante::all();
        return view('rescatados.edit', compact('rescatado', 'adoptantes'));
    }

    public function update(Request $request, Rescatado $rescatado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'nullable|integer',
            'fecha_ingreso' => 'nullable|date',
            'condiciones_especiales' => 'required|boolean',
            'estado' => 'required|string|max:255',
            'adoptante_id' => 'nullable|exists:adoptantes,id',
            'descripcion' => 'nullable|string',
        ]);

        $rescatado->update($request->all());
        return redirect()->route('rescatados.index')->with('success', 'Rescatado actualizado correctamente.');
    }

    public function destroy(Rescatado $rescatado)
    {
        $rescatado->delete();
        return redirect()->route('rescatados.index')->with('success', 'Rescatado eliminado correctamente.');
    }
}
