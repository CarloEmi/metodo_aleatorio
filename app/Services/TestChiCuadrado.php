<?php

namespace App\Services;

use Illuminate\Support\Collection;

class TestChiCuadrado
{
    /**
     *
     */
    public static function testearChiCuadrado($secuencia){
        $test_secuencia = collect([]);
        for($i=0; $i < count($secuencia); $i++){
            $test_secuencia->push($secuencia[$i]);
        }

        // Obtenemos la cantidad de elementos
        $n = $test_secuencia->count();

        // Declaramos las categorias
        $k = 10;

        // Grados de libertad y Porcentaje de error admitido
        $grados_libertad = $k -1 ;
        $error_admitido = $k / 100;

        // Frecuencia teorica o esperada Ei (npi)
        $Ei = $n / $k;

        // Frecuencias observadas
        $Oi = $test_secuencia->countBy()->sortKeys();
        /*
        $array = array();
        for($i = 0; $i < 10; $i++){
            if($Oi->contains($i)){
                $array[$i] = $Oi->get($i);
            }
            else{
                $array[$i]= 0;
            }
        }
        //$Oi->replace([2 => 0]);
        
        dd($array);*/
        // Calculamos (Oi - Ei) ^ 2 / Ei
        $calculos_por_digito = collect([]);
        for($i = 0; $i < $Oi->count(); $i++){
            $valor = ((($Oi[$i]-$Ei)**2)/$Ei);
            $calculos_por_digito->push($valor);
        }
        
        $sumatoria = $calculos_por_digito->sum();
        $valor_chi_cuadrado = 14.6837;
        $resultado_test = $sumatoria<$valor_chi_cuadrado;

        $resultado_final = collect([
            'longitud'              => $n,
            'k'                     => $k,
            'grados_libertad'       => $grados_libertad,
            'error_admitido'        => $error_admitido,
            'frecuencia_esperada'   => $Ei,
            'frecuencia_observada'  => $Oi,
            'calculo_digito'       => $calculos_por_digito,
            'sumatoria'             => $sumatoria,
            'chi_cuadrado'          => $valor_chi_cuadrado,
            'resultado'             => $resultado_test
        ]);

        //dd($resultado_final);

        return $resultado_final;
    }
}