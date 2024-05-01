<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CongruenciaFundamental;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


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
            'semillas' => 'required|array',
            'semillas.*' => 'required|integer',
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
        $semillas = $request->input('semillas');
    
        // Generar la secuencia
        $secuencia = CongruenciaFundamental::generarSecuencia($semillas, $a, $c, $k, $m, $cantidad);
    
        // Dividir la secuencia en grupos de 10
        $grupos = array_chunk($secuencia, 10);
        // Devolver la vista con la secuencia generada
        return view('congruencia.resultado', compact('secuencia', 'grupos'));
    }
    
}
