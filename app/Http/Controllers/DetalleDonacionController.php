<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetalleDonacion;
use Illuminate\Http\Request;

class DetalleDonacionController extends Controller
{
  public function index()
    {
        $detalles = DetalleDonacion::with('donacion')->paginate(10);
        return view('detalle_donacion.index', compact('detalles'));
    }


    public function create()
{
    $donaciones = DetalleDonacion::all(); // ✅ CORRECTO: esto trae las donaciones
    return view('detalle_donacion.create', compact('donaciones'));
}

}
