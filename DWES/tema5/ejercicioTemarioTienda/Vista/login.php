<?php
require_once '../Controlador/ControladorBD.php';
session_start();

//Si existe la variable usuario es que hay una sesion activa
if (isset($_SESSION['usuario']))
    header("Location: productos.php");

//Si se ha enviado el formulario
if (isset($_POST['enviar'])){
    //Si se ha encontrado se inicia la sesion y se redirige a la pagina portal
    if (ControladorBD::login($_POST['usuario'], $_POST['contra'])){
        $_SESSION['usuario']=$_POST['usuario'];
        header('Location: productos.php');
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. login.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA</title>
        <link href="tienda.css.css" rel="stylesheet" type="text/css">
    </head>
<body>
<div id='login'>
    <form action='login.php' method='post'>
     <fieldset >
        <legend>Login</legend>
        <div><span class='error'>
            <?php
            if (isset($_POST['enviar']))
                echo '<p>Usuario o contraseña erroneos';
            ?>            
        </span></div>
    <div class='campo'>
        <label for='usuario' >Usuario:</label><br/>
        <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
    </div>
    <div class='campo'>
        <label for='password' >Contraseña:</label><br/>
        <input type='password' name='contra' id='password' maxlength="50" /><br/>
    </div>
    <div class='campo'>
        <input type='submit' name='enviar' value='Enviar' />
    </div>
      </fieldset>
    </form>
</div>

<?php




?>
</body>
</html>



