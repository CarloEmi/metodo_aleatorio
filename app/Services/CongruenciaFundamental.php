<?php

namespace App\Services;

class CongruenciaFundamental
{
    public static function generarSecuencia($a, $c, $m, $cantidad)
    {
        // Inicializar la secuencia
        $secuencia = [];

        // Calcular k como un valor menos que la cantidad de semillas ingresadas
        $k = $cantidad - 1;
        
        // Calcular el primer elemento de la secuencia (V_0)
        $V_i = rand(1, $m); // Elegir un valor aleatorio para V_0

        // Generar la secuencia
        for ($i = 0; $i < $cantidad; $i++) {
            // Calcular Vi+1 = (a * Vi + c * Vi-k) mod m
            $Vi_k = $i >= $k ? $secuencia[$i - $k] : 0; // Usar 0 si no hay suficientes elementos en la secuencia
            $Vi_mas_1 = ($a * $V_i + $c * $Vi_k) % $m;
            
            // Agregar Vi+1 a la secuencia
            $secuencia[] = $Vi_mas_1;

            // Actualizar Vi para el siguiente ciclo
            $V_i = $Vi_mas_1;
        }

        // Devolver la secuencia generada
        return $secuencia;
    }
}
