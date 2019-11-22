<!DOCTYPE html>
<?php
REQUIRE 'funciones.php';

session_start();

checkSesion(true, "inicio.php");

//Boolean para mensaje de error
$emailValido=true;

//Si se ha enviado el form
if (isset($_POST['enviar'])){

    //Si el email es valido y no existe en la base de datos se registra al usuario en la base de datos
    if (validarEmail($_POST['email'])){
        $conex= getConex();

        //La contrasena va encriptada
        $passEncr=md5($_POST['pass']);

        $conex->query("INSERT INTO usuarios VALUES"
                . "('$_POST[nombre]', '$_POST[apellidos]', '$_POST[direccion]', '$_POST[localidad]', '$_POST[email]', '$passEncr',"
                . "'$_POST[colorLetra]', '$_POST[colorFondo]', '$_POST[tipoLetra]', $_POST[tamanio] );");

        $conex->close();
        
        configurarSesion();
        
        header("Location: inicio.php");
    }
    //Si no es valido se cambia el boolean
    else
        $emailValido=false;
}

//Si el usuario ha intentado logearse 3 o mas veces se le redirige a la pagina de error
if ($_SESSION['intentos']<=0)
    header("Location: demasiadosIntentos.php");

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Formulario de registro</h1>
        <form action="registro.php" method="post">
            Nombre: <input type="text" name="nombre" required><br>
            Apellido: <input type="text" name="apellidos" required><br>
            Direccion: <input type="text" name="direccion" required><br>
            Localidad: <input type="text" name="localidad" required><br>
            Email: <input type="text" name="email" required> <?php if (!$emailValido) echo "<p style='color:red;'>Email invalido o en uso, introduzca otro</p>"; ?><br>
            Contraseña: <input type="password" name="pass" required><br>
            Color letra:
            <select name="colorLetra">
                <option value="red">Rojo</option>
                <option value="blue">Azul</option>
                <option value="green">Verde</option>
                <option value="magenta">Magenta</option>
                <option value="yellow">Amarillo</option>
            </select><br>
            
            Color fondo:
            <select name="colorFondo">
                <option value="red">Rojo</option>
                <option value="blue">Azul</option>
                <option value="green">Verde</option>
                <option value="magenta">Magenta</option>
                <option value="yellow">Amarillo</option>
            </select><br>
            
            Tipo letra:
            <select name="tipoLetra">
                <option value="Times New Roman">Times New Roman</option>
                <option value="Impact">Impact</option>
                <option value="Lucida Sans Unicode">Lucida Sans</option>
                <option value="Georgia">Georgia</option>
                <option value="Comic Sans MS">Comic Sans</option>
            </select><br>

            Tamaño letra: <input type="number" name="tamanio" min="8" max="40"><br>
            
            <input type="submit" name="enviar" value="Enviar">
        </form>
        
        <a href="index.php">Volver</a>
    </body>
</html>
