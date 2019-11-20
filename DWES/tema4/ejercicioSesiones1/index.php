<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        
        //Si existe la variable usuario es que hay una sesion activa
        if (isset($_SESSION['usuario']))
            header("Location: portal.php");
        
        //Si se ha enviado el formulario
        if (isset($_POST['enviar'])){
            //Se comprueba si el usuario y la contrasena son correctos
            $conex=new mysqli("localhost", 'dwes', 'abc123.', 'ejemplo');

            //La contrasena se encripta
            $passEnc=md5($_POST['contr']);

            $resultado=$conex->query("SELECT * FROM usuarios WHERE contrasena='$passEnc' AND usuario='$_POST[usuario]';");

            //Si se ha encontrado se inicia la sesion y se redirige a la pagina portal
            if ($resultado->num_rows==1){
                $_SESSION['usuario']=$_POST['usuario'];
                header('Location: portal.php');
            }
        }
        ?>
        
        <form action="index.php" method="post">
            <?php
            if (isset($_POST['enviar']))
                echo "<p style='color:red;'>Usuario o contrasena incorrectos</p> <br>";
            ?>
            
            Usuario: <input type="text" name="usuario"/><br>
            Contraseña: <input type="password" name="contr"><br>
            <input type="submit" name="enviar"/>
        </form>
    </body>
</html>
