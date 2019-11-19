<?php

session_start();
if (isset($_POST['cerrarSesion'])){
    session_unset();
    header("Location: login.php");
}
elseif(isset($_POST['borrarHist'])){
    unset($_SESSION['visitas']);
    header("Location: portal.php");
}

