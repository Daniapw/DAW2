<?php
session_start();

if (!isset($_SESSION['usuario'])){
    echo "No se ha abierto una sesion, debe <a href='index.php'>identificarse...</a>";
    die();
}


session_unset();
session_destroy();
setcookie(session_name(), session_id(), time() - 7200, "/");

header("Location: index.php");
