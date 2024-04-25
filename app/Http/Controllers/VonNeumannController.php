<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VonNeumannController extends Controller
{
    public function pruebaVonNeumann(Request $request)
    {
        $secuencia = $request->input('secuencia');

        // Verificar si $secuencia es null o un array
        if (!is_null($secuencia) && is_array($secuencia)) {
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
            
            return view('pruebaNeumann', [
                'pares_iguales' => $paresIguales,
                'primer_menor_segundo' => $primerMenorSegundo,
                'segundo_menor_primer' => $segundoMenorPrimer
            ]);
        } else {
            // Manejar el caso en que $secuencia es null o no es un array
            return redirect()->back()->with('error', 'La secuencia no es válida.');
        }
    }


   
}
