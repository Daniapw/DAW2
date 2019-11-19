<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        if (isset($_SESSION['usuario']))
            header ("Location: portal.php");
        
        function usuarioExiste(){
            
            if (isset($_POST['enviar'])){
                $conex=new mysqli("localhost", 'dwes', 'abc123.', 'ejemplo');

                $passEnc=md5($_POST['cont']);

                $resultado=$conex->query("SELECT * FROM usuarios WHERE contrasena='$passEnc' AND usuario='$_POST[usuario]';");

                if ($resultado->num_rows==0)
                    return false;

                return true;
            }
            
            return false;
        }
        
        //Form
        if (!usuarioExiste()){
        
            if (isset($_POST['enviar']) && !usuarioExiste())
                echo "<p style='color:red;'>Usuario o contraseña incorrectos</p>";?>

            <form action="login.php" method="post">

                Usuario: <input type="text" name="usuario" required value=""/><br>
                Contrasena: <input type="password" name="cont" required value=''/><br>
                Recordarme <input type="checkbox" value="1" name="recordarme"> <br>
                <input type="submit" name="enviar" value="Enviar"/>

            </form>

        <?php
        }else{
            session_start();
            session_set_cookie_params(3600);
            $_SESSION['usuario']=$_POST['usuario'];

            
            header("Location: portal.php");
        }
        ?>
    </body>
</html>