<?php
session_start();

if (!isset($_SESSION['usuario'])){
    echo "No se ha abierto una sesion, debe <a href='index.php'>identificarse...</a>";
    die();
}

setcookie(session_name(), session_id(), time() - 7200, "/");
session_unset();
session_destroy();

header("Location: index.php");
