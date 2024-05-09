<?php

namespace App\Services;

use Illuminate\Support\Collection;

class TestMonobits
{

    public static function testearMonobits($secuencia){
        // Inicializamos una  coleccion para almacenar los datos transformados
        $sec_mono = collect([]);

        // Recorremos la secuencia
        foreach($secuencia as $digito){
            // si mi digito es menor a 5 será -1, sino 1
            if($digito < 5){
                $sec_mono->push(-1);
            }else{
                $sec_mono->push(1);
            }
        }

        // Guardamos la cantidad de valores para mostrarlos luego
        $cantUno = $sec_mono->countBy()->get(1);
        $cantMenosUno = $sec_mono->countBy()->get(-1);
        
        // Almacenamos la longitud de la colección para realizar los siguientes cálculos
        $n = $sec_mono->count();

        // Realizamos la sumatoria
        $sn = abs($sec_mono->sum());

        // Realizamos el calculo de Sabs
        $sabs = $sn / ($n ** 0.5);

        // Calculamos el p_valor
        $p_valor = erfc($sabs/(2 ** 0.5));

        // Obtenemos el resultado del test
        // si p-valor < 0.01 entonces no pasa el test de aleatoriedad. Se cambió la condicion
        $resultado = $p_valor > 0.01;

        $resultado_final = collect([
            'cantidad'  => $n,
            'unos'      => $cantUno,
            'menos_uno' => $cantMenosUno,
            'p_valor'   => $p_valor,
            'sesgo'     => 0.01,
            'resultado' => $resultado
        ]);

        //dd($resultado_final);
        return $resultado_final;

    }

}

// Definir la función de error estándar (erf)
function erf($x) {
    return 1 - (1 / sqrt(M_PI)) * exp(-$x * $x);
}

// Definir la función de error complementaria (erfc)
function erfc($x) {
    return 1 - erf($x);
}