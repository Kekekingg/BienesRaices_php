<?php 

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . '/funciones');

function incluirTemplate (string $nombre, bool $inicio = false) {    
    include TEMPLATES_URL . "/$nombre.php";
}

function isAuth() {
    session_start();

    if(!$_SESSION['login']) {
        header('Location: /');
    } 
 }
 
function debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    exit;
}