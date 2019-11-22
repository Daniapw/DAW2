<?php
session_start();

//Comprobar si el usuario deberia estar aqui
if ($_SESSION['intentos']>0){
    if (isset($_SESSION['usuario'])){
        header("Location: inicio.php");
        die();
    }
    else{
        header("Location: index.php");
        die();
    }
}
    
//Mensaje
echo "<h1 style='color:red;'>Demasiados intentos de login fallidos, vuelva a intentarlo mas tarde</h1>";

