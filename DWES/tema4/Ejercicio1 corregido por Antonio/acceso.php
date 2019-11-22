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
        if(isset($_POST['borrar']))
            unset ($_SESSION['visitas']);
        if(isset($_POST['cerrar']))
            header ("Location:logout.php");
        
        if(!isset($_SESSION['usu']))
            header("Location:index.php");
        
        if(!isset($_SESSION['visitas'])){
            echo "Bienvenido ".$_SESSION['usu'];
            $_SESSION['visitas'][]=time();
            setcookie("PHPSESSID",$_COOKIE['PHPSESSID'],time()+7200,"/");
        }
        else{
            echo "Sus últimas visitas son: <br>";
            foreach ($_SESSION['visitas'] as $valor){
                echo "<br>".date("d-m-Y",$valor)." a las ".date("H:i:s",$valor);
            }
            $_SESSION['visitas'][]=time();  
        }        
        ?>
        <form action="" method="POST">
            <input type="submit" name="borrar" value="Borrar historial">
            <input type="submit" name="cerrar" value="Cerrar sesion">
        </form>
    </body>
</html>
