<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VonNeumannController extends Controller
{
    public function pruebaVonNeumann($secuencia)
    {
        $paresIguales = 0;
        $primerMenorSegundo = 0;
        $segundoMenorPrimer = 0;
        
        $numElementos = count($secuencia);
        for ($i = 0; $i < $numElementos - 1; $i++) {
            if ($secuencia[$i] === $secuencia[$i + 1]) {
                $paresIguales++;
            } elseif ($secuencia[$i] < $secuencia[$i + 1]) {
                $primerMenorSegundo++;
            } else {
                $segundoMenorPrimer++;
            }
        }
        
        return response()->json([
            'pares_iguales' => $paresIguales,
            'primer_menor_segundo' => $primerMenorSegundo,
            'segundo_menor_primer' => $segundoMenorPrimer,
        ]);
    }
   
}
