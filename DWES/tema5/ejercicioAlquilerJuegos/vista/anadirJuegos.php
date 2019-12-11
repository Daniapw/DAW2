<!DOCTYPE html>
<?php
require_once '../controlador/JuegoControlador.php';
require_once '../modelo/Juego.php';

//Iniciar sesion
session_start();

//Redirigir si es necesario
if (!isset($_SESSION['usuario']))
    header("Location: index.php");

if ($_SESSION["tipoUsuario"]!="admin")
    header("Location: index.php");


//Si se le ha dado a enviar
if (isset($_POST['anadir'])){
    
    $juegoInsertado=false;
   
    //Si el juego no existe en la base de datos se intenta subir
    if (JuegoControlador::getJuego('codJuegoAdd')==false){
    
        if (is_uploaded_file($_FILES['imagenCaratulaAdd']['tmp_name'])){

            $nombreFicheroCaratula= JuegoControlador::subirCaratula('imagenCaratulaAdd');

            //Insertar juego en BD
            $juego=new Juego($_POST['codJuegoAdd'], $_POST['tituloJuegoAdd'], $_POST['consolaJuegoAdd'], $_POST['annoJuegoAdd'], $_POST['precioJuegoAdd'], 'NO', $nombreFicheroCaratula);

            $juegoInsertado=JuegoControlador::insertJuego($juego);

        }
    }
    
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="alquiler.css">
    </head>
    <body>
        <?php
        include_once 'menu.php';
        ?>
        
        <center><h1>Añadir un juego a la base de datos</h1></center>
        
        <?php
        //Mostrar mensaje de error o exito
        if (isset($juegoInsertado)){
            if (!$juegoInsertado)
                echo "<center><p class='mensajeError'>Error: el juego ya existe en la BDD</p></center>";
            else
                echo "<center><p class='mensajeExito'>Juego subido a la base de datos</p></center>";
        }
            
        //Formulario
        ?>
        <div class="form">
            <form action="anadirJuegos.php" method="post" enctype="multipart/form-data">
                Código: <input type="text" name="codJuegoAdd" required><br>
                Titulo: <input type="text" name="tituloJuegoAdd" required><br>
                Año: <input type="number" min="1975" max="2019" name="annoJuegoAdd" required><br>
                Consola: <input type="text" name="consolaJuegoAdd" required><br>
                Precio: <input type="number" min="0" name="precioJuegoAdd" required><br>
                Imagen caratula:
                <input type="file" name="imagenCaratulaAdd" required><br>

                <input type="submit" value="Enviar" name="anadir" />
            </form>
        </div>
    </body>
</html>
