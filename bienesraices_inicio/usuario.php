<?php

    //Importar la conexion
    require 'includes/config/database.php';
    $db = conectarDB();

    //Crear un email y password
    $email = "correo@correo.com";
    $password = "1234567890";

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    
    

    //Query  para crear el usuario
    $query = " INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash'); ";

    // echo $query;

    //Agregarlo a la BD
    mysqli_query($db, $query);
