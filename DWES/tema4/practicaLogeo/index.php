<!DOCTYPE html>
<?php
REQUIRE 'funciones.php';

session_start();

//Comprobar si hay que redirigir
checkSesion(true, "inicio.php");

//Si la variable de sesion 'intentos' no existe se crea
if (!isset($_SESSION['intentos']))
    $_SESSION['intentos']=3;

//Si el usuario ha intentado entrar
if (isset($_POST['entrar'])){

    //Si el login es correcto se crea la sesion y se resetean los intentos de logeo
    if (login($_POST['email'], $_POST['cont'])){

        //Resetear intentos de logeo
        $_SESSION['intentos']=3;

        //Configurar variables de sesion
        configurarSesion();
        
        //Redirigir a incio
        header("Location: inicio.php");

    }
    //Si no lo es se resta un intento
    else
        $_SESSION['intentos']-=1;
}

//Si el usuario ha intentado logearse 3 o mas veces se le redirige a la pagina de error
if ($_SESSION['intentos']<=0)
    header("Location: demasiadosIntentos.php");

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    
        <link rel="css/stylesheet" href="practicaLogeo.css">
        
    </head>
    <body>
        <?php
        //Mostrar intentos de inicio de sesion
        if (isset($_SESSION['intentos']))
            echo "<p>Te quedan $_SESSION[intentos] intentos de logeo</p>";
        ?>
        
        <form action="index.php" method="post">
            Email: <input type="text" name="email"><br>
            Contraseña: <input type="password" name="cont"><br>
            <input type="submit" name="entrar" value="Entrar">
        </form>
        
        <form action="registro.php" method="post">
            <input type="submit" name="registrar" value="Registrarse">
        </form>
    </body>
</html>
