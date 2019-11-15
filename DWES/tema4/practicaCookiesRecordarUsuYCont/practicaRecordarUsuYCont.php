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

                Usuario: <input type="text" name="usuario" required value=""/><br>
                Contrasena: <input type="password" name="cont" required/><br>
                Recordarme <input type="checkbox" value="1" name="recordarme"/><br>
                <input type="submit" name="enviar" value="Enviar"/>

            </form>

        <?php
        }else{
            setcookie("usuarioActual", $_POST['usuario'],  time()+3600);
            setcookie("$_POST[usuario][cont]", $_POST['cont'],  time()+3600);
        
            if (isset($_POST['recordarme']))
                setcookie("$_POST[usuario][recordar]", "recordar",  time()+3600);

            header("Location: bienvenido.php");
        }
        ?>
    </body>
</html>

