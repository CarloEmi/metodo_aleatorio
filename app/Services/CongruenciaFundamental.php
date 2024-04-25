<?php

namespace App\Services;

class CongruenciaFundamental
{
    public static function generarSecuencia($a, $c, $k, $m, $cantidad)
    {
        // Inicializamos la secuencia con valores aleatorios
        $secuencia = [rand(1, $m)]; // Vi_0 debe ser diferente de 0

        // Generamos la secuencia usando la congruencia fundamental
        for ($i = 1; $i < $cantidad; $i++) {
            // Calculamos Vi_i+1
            $Vi_i = $secuencia[$i - 1];
            $Vi_i_k = $i >= $k ? $secuencia[$i - $k] : 0; // Usamos 0 si no hay suficientes elementos en la secuencia
            $Vi_i_mas_1 = ($a * $Vi_i + $c * $Vi_i_k) % $m;
            $secuencia[] = $Vi_i_mas_1;
        }

        return $secuencia;
    }
}
