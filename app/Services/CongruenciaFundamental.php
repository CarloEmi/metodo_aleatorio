<?php

namespace App\Services;

class CongruenciaFundamental
{
    public static function generarSecuencia($semillas, $a, $c, $k, $m, $cantidad)
    {
        $secuencia = [];

        // Validar que las semillas sean números enteros no negativos
        if (!is_array($semillas) || empty($semillas)) {
            throw new \InvalidArgumentException("Las semillas deben ser un array no vacío.");
        }

        /* Validar que los parámetros de la congruencia sean números enteros no negativos
        if (!is_int($a) || !is_int($c) || !is_int($k) || !is_int($m) || !is_int($cantidad)) {
            throw new \InvalidArgumentException("Los parámetros de la congruencia deben ser números enteros.");
        }*/

        // Validar que la cantidad de elementos sea mayor a cero
        if ($cantidad <= 0) {
            throw new \InvalidArgumentException("La cantidad de elementos debe ser mayor a cero.");
        }

        // Recorremos cada semilla ingresada
        foreach ($semillas as $semilla) {
            $semillaActual = $semilla;

            // Generamos la secuencia para cada semilla
            for ($i = 0; $i < $cantidad; $i++) {
                // Calculamos Vi_i+1
                $Vi_i = $semillaActual;
                $Vi_i_k = ($i >= $k) ? $secuencia[$i - $k] : 0; // Usamos 0 si no hay suficientes elementos en la secuencia
                $Vi_i_mas_1 = ($a * $Vi_i + $c * $Vi_i_k) % $m;

                $secuencia[] = $Vi_i_mas_1;
                $semillaActual = $Vi_i_mas_1;
            }
        }

        return $secuencia;
    }
}

