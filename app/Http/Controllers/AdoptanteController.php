<?php

namespace App\Http\Controllers;

use App\Models\Adoptante;
use App\Models\TipoDocum;
use App\Models\LocalidadUsu;
use App\Models\Barrio;
use Illuminate\Http\Request;

class AdoptanteController extends Controller
{
    public function index()
    {
        $adoptantes = Adoptante::with(['tipoDocumento', 'localidad', 'barrio'])->paginate(10);
        return view('adoptantes.index', compact('adoptantes'));
    }

    public function create()
    {
        $tipos = TipoDocum::all();
        $localidades = LocalidadUsu::all();
        $barrios = Barrio::all();
        return view('adoptantes.create', compact('tipos', 'localidades', 'barrios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:100',
            'edad' => 'nullable|integer',
            'nro_docum' => 'required|integer',
            'tipo_docum' => 'required|exists:tipo_docum,id_tipo',
            'correo' => 'nullable|email|max:100',
            'sexo' => 'nullable|string|max:10',
            'id_localidad' => 'required|exists:localidad_usu,id_localidad',
            'barrio_viv' => 'nullable|string|max:100',
            'rol' => 'required|in:adoptante,donante,ambos',
        ]);

        Adoptante::create($data);

        return redirect()->route('adoptantes.index')->with('success', 'Adoptante registrado correctamente.');
    }

    public function edit(Adoptante $adoptante)
    {
        $tipos = TipoDocum::all();
        $localidades = LocalidadUsu::all();
        $barrios = Barrio::all();
        return view('adoptantes.edit', compact('adoptante', 'tipos', 'localidades', 'barrios'));
    }

    public function update(Request $request, Adoptante $adoptante)
    {
        $data = $request->validate([
            'nombres' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:100',
            'edad' => 'nullable|integer',
            'nro_docum' => 'required|integer',
            'tipo_docum' => 'required|exists:tipo_docum,id_tipo',
            'correo' => 'nullable|email|max:100',
            'sexo' => 'nullable|string|max:10',
            'id_localidad' => 'required|exists:localidad_usu,id_localidad',
            'barrio_viv' => 'nullable|string|max:100',
            'rol' => 'required|in:adoptante,donante,ambos',
        ]);

        $adoptante->update($data);

        return redirect()->route('adoptantes.index')->with('success', 'Adoptante actualizado correctamente.');
    }

    public function destroy(Adoptante $adoptante)
    {
        $adoptante->delete();
        return redirect()->route('adoptantes.index')->with('success', 'Adoptante eliminado correctamente.');
    }
}
