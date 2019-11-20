<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //Reanudar sesion
        session_start();
        
        if (!isset($_SESSION['usuario']))
            header("Location: index.php");
        
        //Si se ha pulsado el boton borrar historial se borra la variable visitas
        if (isset($_POST['borrar']))
            unset($_SESSION['visitas']);
        
        //Si se ha pulsado el boton cerrar sesion se redirige a la pagina de logout
        if (isset($_POST['cerrar']))
            header("Location: logout.php");
        
        //Si es su primera visita en esta sesion se muestra un mensaje
        if (!isset($_SESSION['visitas']))
            echo "Bienvenido $_SESSION[usuario]";
        //Si no es su primera visita se muestra un mensaje y el historial de visitas
        else{
            echo "Hola de nuevo $_SESSION[usuario]"
                    . "<br>Historial de visitas:<br>";
            
            //Mostrar historial de visitas
            foreach($_SESSION['visitas'] as $valor){
                echo date('d/m/Y',$valor)." a las ". date('h:i:s', $valor)."<br>";
            }
        }
        
        //Anadir esta visita al historial
        $_SESSION['visitas'][]=mktime();
        
        //Formulario con botones para borrar historial y cerrar sesion
        ?>
        <form action="portal.php" method="post">
            <input type="submit" name="borrar" value="Borrar historial">
            <input type="submit" name="cerrar" value="Cerrar sesion">
        </form>
    </body>
</html>
