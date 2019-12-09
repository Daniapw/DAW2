<!DOCTYPE html>
<?php
require_once '../controlador/JuegoControlador.php';
require_once '../modelo/Juego.php';

//Iniciar sesion
session_start();

//Redirigir si es necesario
if (!isset($_SESSION['usuario']))
    header("Location: index.php");
elseif ($_SESSION["tipoUsuario"]!="admin")
    header("Location: index.php");


//Obtener datos del juego
$juego= JuegoControlador::getJuego($_POST['codigoJuegoModificar']);


//Si se le ha dado a enviar
if (isset($_POST['modificar'])){
    //Si no se ha subido una nueva caratula se actualiza el juego con la caratula que tenia antes
    if ($_FILES['imagenCaratulaMod']['size']==0)
        $juegoMod=new Juego($_POST['codigoJuegoModificar'], $_POST['tituloJuegoMod'], $_POST['consolaJuegoMod'], $_POST['annoJuegoMod'], $_POST['precioJuegoMod'], $_POST['alquiladoMod'], $juego->imagen);
    else{

        $nombreFicheroCaratula=JuegoControlador::subirCaratula('imagenCaratulaMod');
        
        $juegoMod=new Juego($_POST['codigoJuegoModificar'], $_POST['tituloJuegoMod'], $_POST['consolaJuegoMod'], $_POST['annoJuegoMod'], $_POST['precioJuegoMod'], $_POST['alquiladoMod'], $nombreFicheroCaratula);

    }
    
    //Actualizar juego
    $juegoSubido=JuegoControlador::updateJuego($juegoMod);
    
    
}

//Obtener datos del juego
$juego= JuegoControlador::getJuego($_POST['codigoJuegoModificar']);


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
        
        <h1>Modificar <?php echo $juego->nombreJuego ?></h1>
        
        <?php
        //Mostrar mensaje de error o exito
        if (isset($juegoSubido)){
            if (!$juegoSubido)
                echo "<p class='mensajeError'>Error al modificar juego</p>";
            else
                echo "<p class='mensajeExito'>Juego modificado con exito</p>";
        }
        
        ?>
        <div>
            <img class="miniaturaAlq" src="<?php echo "../assets/img/$juego->imagen" ?>">
            <form action="modificarJuego.php" method="post" enctype="multipart/form-data">
                Código: <input type="text" name="codigoJuegoModificar" value="<?php echo $juego->codigo ?>" readonly><br>
                Titulo: <input type="text" name="tituloJuegoMod" value="<?php echo $juego->nombreJuego ?>" required><br>
                Año: <input type="number" min="1975" max="2019" name="annoJuegoMod" value="<?php echo $juego->anno ?>" required><br>
                Consola: <input type="text" name="consolaJuegoMod" value="<?php echo $juego->nombreConsola ?>" required><br>
                Precio: <input type="number" min="0" name="precioJuegoMod" value="<?php echo $juego->precio ?>" required><br>
                Imagen caratula:
                <input type="file" name="imagenCaratulaMod"><br>
                Alquilado:
                <select name="alquiladoMod">
                    <option value="SI" <?php if ($juego->alquilado=='SI') echo "checked" ?>>SI</option>
                    <option value="NO" <?php if ($juego->alquilado=='NO') echo "checked" ?>>NO</option>
                </select><br>

                <input type="submit" value="Modificar" name="modificar" />
            </form>
        </div>
    </body>
</html>
