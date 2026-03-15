<?php

function conectarDB() : mysqli {
    $db =new mysqli('localhost', 'root','root69', 'bienesraices_crud');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    }

    //Retorna la instancia de la conexion
    return $db;
}