<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CongruenciaFundamental;

class CongruenciaFundamentalController extends Controller
{
    public function index()
    {
        return view('congruencia.index');
    }

    
    public function generarSecuencia(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'a' => 'required|integer',
            'c' => 'required|integer',
            'k' => 'required|integer',
            'm' => 'required|integer|min:1',
            'cantidad' => 'required|integer|min:1',
        ]);

        // Obtener los datos del formulario
        $a = $request->input('a');
        $c = $request->input('c');
        $k = $request->input('k');
        $m = $request->input('m');
        $cantidad = $request->input('cantidad');

        // Generar la secuencia
        $secuencia = CongruenciaFundamental::generarSecuencia($a, $c, $k, $m, $cantidad);

        // Devolver la vista con la secuencia generada
        return view('congruencia.resultado', compact('secuencia'));
    }

}
