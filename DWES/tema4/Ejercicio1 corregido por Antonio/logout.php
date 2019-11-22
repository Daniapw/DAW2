<?php
session_start();
if(!isset($_SESSION['usu']))
    die("ERROR: Primero debes logueate. <a href=index.php>Identificate...</a>");

session_unset();
session_destroy();
setcookie("PHPSESSID",$_COOKIE['PHPSESSID'],time()-7200,"/");
header("Location:index.php");
