<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if(isset($_SESSION['usu'])){
            header("Location:acceso.php");
        }
        if(isset($_POST['enviar'])){
            $conex=new mysqli("localhost","dwes","abc123.","dwes");
            $pass= md5($_POST['pass']);
            $result=$conex->query("SELECT * FROM usuarios WHERE usuario='$_POST[usu]' && contrasena='$pass'");
            if($conex->affected_rows>0){
                //session_start();
                $_SESSION['usu']=$_POST['usu'];
                header("Location:acceso.php");
            }
        }
        ?>
        <form action="" method="POST">
            Usuario:<input type="text" name="usu"><br>
            Clave: <input type="password" name="pass"><br>
            <input type="submit" name="enviar" value="Enviar"><br>
        </form>
        <?php
        if(isset($_POST['enviar']) && !isset($_SESSION['usu']))
            echo "Usuario o contraseña incorrectas";
        ?>
    </body>
</html>
