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
        
        
        if (!usuarioExiste()){
        
            if (isset($_POST['enviar']) && !usuarioExiste())
                echo "<p style='color:red;'>Usuario o contraseña incorrectos</p>";?>

            <form action="practicaRecordarUsuYCont.php" method="post">

                Usuario: <input type="text" name="usuario" required value="<?php if(isset($_COOKIE['recordar'])) echo $_COOKIE['usuario'] ?>"/><br>
                Contrasena: <input type="password" name="cont" required value='<?php if(isset($_COOKIE['recordar'])) echo $_COOKIE['contr'] ?>'/><br>
                Recordarme <input type="checkbox" value="1" name="recordarme" <?php if(isset($_COOKIE['recordar'])) echo "checked" ?>/><br>
                <input type="submit" name="enviar" value="Enviar"/>

            </form>

        <?php
        }else{
            setcookie("usuario", $_POST['usuario'],  time()+3600);
            setcookie("contr", $_POST['cont'],  time()+3600);
        
            //Si la casilla recordar esta marcada se crea/modifica la cookie, si no lo esta se borra
            if (isset($_POST['recordarme']))
                setcookie("recordar", "true",  time()+3600);
            else{
                if (isset($_COOKIE['recordar']))
                    setcookie("recordar", "false",  time());
            }
            
            //Crear/modificar cookie fecha ultima visita
            if (!isset($_COOKIE[$_POST['usuario']]["fechaUltimaVisita"]))
                setcookie($_POST['usuario']."[fechaUltimaVisita]", date('d/m/Y h:i:s', time()),  time()+3600);
            else
                setcookie($_POST['usuario']."[fechaUltimaVisita]", $_COOKIE[$_POST['usuario']]["fechaUltimaVisita"],  time()+3600);

            
            header("Location: bienvenido.php");
        }
        ?>
    </body>
</html>

