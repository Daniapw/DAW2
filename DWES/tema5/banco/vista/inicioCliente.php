<?php
require_once '../controlador/CuentaControlador.php';
require_once '../controlador/TransferenciaControlador.php';
require_once '../modelo/Transferencia.php';
require_once '../modelo/Cuenta.php';
require_once '../modelo/Usuario.php';

session_start();

//Redirigir si es necesario
if (!isset($_SESSION['usuario']))
    header("Location: login.php");

//Obtener cuentas de usuario
if (!isset($_POST['historialCuenta']))
    $cuentas=CuentaControlador::getCuentasUsuario($_SESSION['usuario']->dni);

//Obtener historial
if (isset($_POST['historialCuenta']))
    $transferencias= TransferenciaControlador::getTransferencias($_POST['ibanHistorial']);

//Quitar cuenta transferencia
if (isset($_SESSION['cuentaTransferencia']))
    unset($_SESSION['cuentaTransferencia']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Banco Comares</h1>
        
        <?php
        echo "<h2>Bienvenido ".$_SESSION["usuario"]->nombre."</h2>";
        echo "<h3>Mis cuentas</h3>";
        
        
        //Si no se ha solicitado el historial de una cuenta se mostrara una lista de las cuentas del usuario
        if (!isset($_POST['historialCuenta'])){
            //Mostrar tabla con cuentas de usuario si las tiene
            if (!empty($cuentas)){
                ?>
                <table border='1' cellpadding='10'>
                    <tr>
                        <th>IBAN</th>
                        <th>Saldo</th>
                        <th>Operaciones</th>
                    </tr>

                <?php

                foreach($cuentas as $cuenta){
                ?>
                    <tr>
                        <td><?php echo $cuenta->iban ?></td>
                        <td><?php echo $cuenta->saldo ?>€</td>
                        <td>
                            <form action='transferencias.php' method="post">
                                <input type='hidden' name='ibanTransferencia' value='<?php echo $cuenta->iban ?>'>
                                <input type='submit' name='transferenciasCuenta' value='Transferencia'>
                            </form>

                            <br>

                            <form action='#' method="post">
                                <input type='hidden' name='ibanHistorial' value='<?php echo $cuenta->iban ?>'>
                                <input type='submit' name='historialCuenta' value='Historial'>
                            </form>
                        </td>
                    </tr>
                <?php  
                }  

                echo "</table>";
            }
            
            //Si no tiene cuentas
            else
                echo "<p>No tienes ninguna cuenta ahora mismo</p>";
            
        }
        //Si se ha solicitado el historial de una cuenta se mostrara una lista de transferencias realizadas desde esa cuenta
        else{
            echo "<h3>Historial de transferencias realizadas desde la cuenta $_POST[ibanHistorial]</h3>";
            ?>

            <table border='1' cellpadding='10'>
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Destino</th>
                </tr>

            <?php

            foreach($transferencias as $transferencia){
            ?>   
                <tr>
                    <td><?php echo $transferencia->getFechaFormateada() ?></td>
                    <td><?php echo $transferencia->cantidad ?>€</td>
                    <td><?php echo $transferencia->ibanDestino ?></td>
                </tr>
            <?php
            }
            ?>
            </table>

            <br>
            <a href="inicioCliente.php">Volver a inicio</a>
            <br>
        <?php 
        }
        ?>
        
        <!--Formulario logout-->
        <br>
        <form action="logout.php" method="post">
            <input type="submit" name="logout" value="Salir">
        </form>
    </body>
</html>
