<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TestChiCuadrado;
use App\Services\TestMonobits;
use App\Services\VonNeumann;

class vonNeumannController extends Controller
{
    public function index(){
        return view('neumann.index');
    }

    public function VonNeumann(Request $request){
        
        $request->validate([
            'semilla'   => 'required|integer|min:4',
            'cantidad'  => 'required|integer'
        ]);

        $sm1 = $request->semilla;
        $cantidad = $request->cantidad;

        $resultado = VonNeumann::generarSecuencia($sm1, $cantidad);
        $resultado_test = TestChiCuadrado::testearChiCuadrado($resultado);
        $resultado_mono = TestMonobits::testearMonobits($resultado);

        //dd($resultado_test->get('frecuencia_observada')->all()['key']);
        return view("neumann.tabla_resultados",[
            "resultados"    => $resultado, 
            "semilla"       => $request->semilla, 
            "cantidad"      => $cantidad,
            'test'          => $resultado_test,
            'test_mono'     => $resultado_mono
            ]);
    }

}