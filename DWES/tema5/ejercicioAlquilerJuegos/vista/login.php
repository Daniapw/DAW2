<!DOCTYPE html>
<?php
require_once "../controlador/ControladorBD.php";
session_start();



//Si el usuario ha enviado el form de login
if (isset($_POST['login'])){
    
    if (ControladorBD::login($_POST['usuario'], $_POST['pass'])){
        $_SESSION['usuario']=$_POST['usuario'];
    }
}

//Redirigir si es necesario
if (isset($_SESSION['usuario']))
    header("Location: index.php");


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="alquiler.css">
    </head>
    <body>
        <!--Menu-->
        <?php
            include_once 'menu.php';
        ?>
        
        <!--Form login-->
        
        <div class="login">
            <h1>Login</h1>
            <?php
                if (isset($_POST['login']))
                    echo "<p style='color:red;'>Usuario o contraseña incorrectos</p>";
            ?>
            <form action="#" method="post">
                Usuario: <input type="text" name="usuario" required><br>
                Contraseña: <input type="password" name="pass" required><br>
                <input type="submit" name="login" value="Login">

            </form>
        </div>
    </body>
</html>
