<?php

function MontoAPagar($tiempo_vuelo, $vuelo_tipo_id){


if ($tiempo_vuelo = 1800){
    switch ($vuelo_tipo_id){
        case 1:
            echo "precio_minimo_local";
            break;
        case 2:
            echo "precio_minimo_popular";
            break;
        case 3:
            echo "precio_minimo_taxeo";
            break;
        case 4:
            echo "precio_minimo_instruccion";
            break;
        case 5:
            echo "precio_minimo_privado";
            break;
    }
}elseif($tiempo_vuelo > 1800){
    switch ($vuelo_tipo_id){
        case 1:
            $precio_local = xxxx; //precio por cada media hora
            $precio = $precio_local * $tiempo_vuelo;
            echo $precio;
            return $precio;
            break;
        case 2:
            $precio_popular = xxxx;
            $precio = $precio_popular * $tiempo_vuelo;
            echo $precio;
            return $precio;
            break;
        case 3:
            $precio_taxeo = xxxx;
            $precio = $precio_taxeo * $tiempo_vuelo;
            echo $precio;
            return $precio;
            break;
        case 4:
            $precio_instruccion = xxxx;
            $precio = $precio_instruccion * $tiempo_vuelo;
            echo $precio;
            return $precio;
            break;
        case 5:
            $precio_privado = xxxx;
            $precio = $precio_privado * $tiempo_vuelo;
            echo $precio;
            return $precio;
            break;
    }
}




?>