<?php
session_start();

//Redirigir si el usuario no ha iniciado sesion
if (!isset($_SESSION['usuario'])){
    header("Location: index.php");
    die();
}

//Cerrar sesion
session_unset();
session_destroy();
setcookie(session_name(), session_id(), time() - 7200, "/");

//Redirigir
header("Location: login.php");

