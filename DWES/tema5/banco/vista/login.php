<?php
require_once '../controlador/UsuarioControlador.php';
require_once '../modelo/Usuario.php';

session_start();

//Si se ha enviado el formulario de logeo
if (isset($_POST['login'])){
    
    //Si el usuario existe
    if (UsuarioControlador::login($_POST['dniLogin'], $_POST['passLogin']))
        $_SESSION['usuario']= UsuarioControlador::getUsuario($_POST['dniLogin']);
    
}

//Si el usuario ya se ha logeado con exito
if (isset($_SESSION['usuario']))
    header("Location:inicioCliente.php");


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Login</h1>
        <?php
            //Mensaje de error
            if (isset($_POST['login']))
                echo "<p style='color:red'>Usuario o contrasena incorrectos</p>";
        ?>
        
        <form action="#" method="post">
            DNI: <input type="text" name="dniLogin" required><br>
            Contraseña: <input type="password" name="passLogin" required><br>
            <input type="submit" name="login" value="Entrar">
        </form>
    </body>
</html>
