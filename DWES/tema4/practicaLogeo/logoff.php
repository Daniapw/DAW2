<?php

session_start();


//Comprobar si el usuario deberia estar aqui y redirigirlo en caso de que no
if ($_SESSION['intentos']<=0){
    header("Location: demasiadosIntentos.php");
    die();
}

if (!isset($_SESSION['usuario'])){
    header("Location: index.php");
    die();
}

//Cerrar la sesion
session_unset();
session_destroy();
setcookie("PHPSESSID",$_COOKIE['PHPSESSID'],time()-7200,"/");

//Redirigir
header("Location: index.php");

