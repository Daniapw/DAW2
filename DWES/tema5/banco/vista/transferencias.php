<?php
require_once '../controlador/CuentaControlador.php';
require_once '../modelo/Cuenta.php';
session_start();

//Redirigir si es necesario
if (!isset($_SESSION['usuario']))
    header("Location:login.php");

if (!isset($_POST['transferenciasCuenta']))
    header("Location: inicioCliente.php");
else{
    //Obtener cuenta desde la que se va a realizar la transaccion
    $_SESSION['cuentaTransferencia']= CuentaControlador::getCuenta($_POST['ibanTransferencia']);

    //Obtener cuentas de usuarios con nombres
    $cuentasDestinatarias= CuentaControlador::getCuentasUsuarios($_POST['ibanTransferencia']);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Banco Comares</h1>
        <h3>Realizar transferencia</h3>
        
        <!--Formulario para realizar la transferencia-->
        <form action="validar_transferencia.php" method="post">
            Cantidad: <input type="number" min="0" name="cantidadTransferencia" required><br>
            
            Cuenta destinataria:
            <select name="ibanDestinoTrans">
                <?php
                foreach($cuentasDestinatarias as $usuario){
                    foreach($usuario as $nombre=>$cuenta){
                        echo "<option value='$cuenta->iban'>$nombre-$cuenta->iban</option>";
                    }
                }
                ?>
            </select>
            
            <input type="submit" name="realizarTransferencia" value="Realizar transferencia">
        </form>
        
        <br>
        <!--Link para volver a inicio-->
        <a href="inicioCliente.php">Volver a inicio</a>
        
        <br>
        <!--Formulario de logout-->
        <form action="logout.php">
            <input type="submit" value="Salir">
        </form>
        
    </body>
</html>
