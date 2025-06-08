<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::with(['raza', 'estado'])->paginate(10);
        return view('mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        return view('mascotas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'nullable|integer',
            'descripcion_rescate' => 'nullable|string',
            'fecha_ingreso' => 'nullable|date',
            'condiciones_especiales' => 'required|boolean',
            'sexo' => 'required|string',
            'estado_id' => 'required|exists:estados,id',
            'raza_id' => 'required|exists:razas,id'
        ]);

        Mascota::create($request->all());
        return redirect()->route('mascotas.index')->with('success', 'Mascota creada correctamente.');
    }

    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'nullable|integer',
            'descripcion_rescate' => 'nullable|string',
            'fecha_ingreso' => 'nullable|date',
            'condiciones_especiales' => 'required|boolean',
            'sexo' => 'required|string',
            'estado_id' => 'required|exists:estados,id',
            'raza_id' => 'required|exists:razas,id'
        ]);

        $mascota->update($request->all());
        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente.');
    }

    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada correctamente.');
    }
}
