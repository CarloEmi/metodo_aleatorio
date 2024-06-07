<?php

namespace App\Services;

class VonNeumann
{
    public static function generarSecuencia($sm1, $cantidad)
    {
        //$sm1 = $semilla;
        //$cantidad = $cantidad;
        $contador = 1;

        # Agregamos la primer semilla al resultado final
        $resultado = str_split($sm1);

        while($contador < $cantidad){
            
            // Elevamos al cuadrado la semilla
            $cuadrado = pow($sm1, 2);

            // Convertimos a texto el resultado y transformamos a un array
            $resultadoTexto = strval($cuadrado);
            $array = str_split($resultadoTexto);
            

            //Validamos que el resultado tengo 8 digitos
            if(count($array) <  8){
                while(count($array) < 8){
                    array_unshift($array, "0");
                }
            }

            // Extraemos los cuatro valores centrales
            $sm1 = "";
            for($i = 2; $i<6; $i++){
                if($i == 4 && $array[$i] == 0 && $array[$i+1] == 0){
                    $sm1 = $sm1."1"."3";
                    array_push($resultado, "1", "3");
                    break;
                }
                $valor = $array[$i];
                $sm1 = $sm1.$valor;
                array_push($resultado, $valor);
            }

            $contador = $contador + 1;
        }

        return $resultado;
    }
}