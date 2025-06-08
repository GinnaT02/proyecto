<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Raza;
use App\Models\Estado;
use App\Models\DetalleCondicion;
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
    $razas = Raza::all();
    $estados = Estado::all();
    $condiciones = DetalleCondicion::all();

    return view('mascotas.create', compact('razas', 'estados', 'condiciones'));
}


    // Relación con Raza
public function raza()
{
    return $this->belongsTo(Raza::class, 'raza_id');
}

// Relación con Estado
public function estado()
{
    return $this->belongsTo(Estado::class, 'estado_id');
}

// Relación con Condición
public function condicion()
{
    return $this->belongsTo(DetalleCondicion::class, 'condicion_id');
}


  public function store(Request $request)
{
      
    $request->validate([
        'nombre' => 'required|string|max:255',
        'edad' => 'nullable|integer',
        'vacunado' => 'required|boolean',
        'peligroso' => 'required|boolean',
        'esterilizado' => 'required|boolean',
        'genero' => 'required|string|max:10',
        'raza_id' => 'required|exists:raza,id_raza',
        'condicion_id' => 'required|exists:detalle_condicion,id_condicion',
        'fecha_ingreso' => 'nullable|date',
        'condiciones_especiales' => 'nullable|string',
        'estado_id' => 'required|exists:estado,id_estado'
    ]);

    Mascota::create($request->all());

    return redirect()->route('mascotas.index')
        ->with('success', 'Mascota creada correctamente.');
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
