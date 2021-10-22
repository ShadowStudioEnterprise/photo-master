<?php
function esOpcionMenuActiva(string $option): bool{
    if (strpos($_SERVER["REQUEST_URI"], "/". $option) === 0 ){
        return true;
    }elseif ("/" === $_SERVER["REQUEST_URI"] && ("index" == $option)){
        return true;
    }else   
        return false;
}
function  existeOpcionMenuActivaEnArray(array $options): bool{
    foreach ($options as $option){
        if (esOpcionMenuActiva($option)) {
            return true;
        }
    }
    return false;
}
function sanitizeInput(string $data )
{
    $data= trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}