<?php
require_once '../controlador/CuentaControlador.php';
require_once '../controlador/TransferenciaControlador.php';
require_once '../modelo/Cuenta.php';
require_once '../modelo/Transferencia.php';

session_start();

//Redirigir si es necesario
if (!isset($_SESSION['usuario']))
    header("Location:login.php");

//Si el usuario no viene de una de estas paginas
if (!isset($_POST['realizarTransferencia']) && !isset($_POST['confirmarTransf']))
    header("Location: inicioCliente.php");

//Si el usuario viene de la pagina transferencias
if (isset($_POST['realizarTransferencia'])){
    
    //Cantidad final transferencia
    $cantidadFinal=Transferencia::calcularTransferencia($_POST['cantidadTransferencia']);
    //Comision transferencia
    $comisionTrans=Transferencia::calcularComisionTrans($_POST['cantidadTransferencia']);

    //Saldo post transferencia
    $saldoPostTrans=$_SESSION['cuentaTransferencia']->saldo-$cantidadFinal;
    
}

//Si el usuario confirma la transferencia
if (isset($_POST['confirmarTransf'])){
    //Crear objeto transferencia
    $transferencia=new Transferencia($_SESSION['cuentaTransferencia']->iban, $_POST['ibanDestinatariaTransf'], $_POST['cantidadFinalTrans'], mktime());

    //Realizar transferencia
    TransferenciaControlador::realizarTransferencia($transferencia);
    
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
        <h3>Datos de la transferencia</h3>
        
        <?php
        
        if (!isset($_POST['confirmarTransf'])){
            if ($saldoPostTrans<0)
                echo "<center><p style='color:red;'>Saldo insuficiente, no es posible realizar la transferencia</p></center>";
        ?>
        
            <!--Tabla con datos de la transferencia-->
            <table border="1" cellpadding="10">
                <tr>
                    <th colspan="6">Datos de la transferencia</th>
                </tr>
                <tr>
                    <th>Cuenta origen</th>
                    <th>Cuenta destino</th>
                    <th>Cantidad a transferir</th>
                    <th>Comisión (1% de la cantidad transferida)</th>
                    <th>Saldo Pre-Transferencia</th>
                    <th>Saldo Post-Transferencia</th>

                </tr>
                <tr>
                    <td><?php echo $_SESSION['cuentaTransferencia']->iban ?></td>
                    <td><?php echo $_POST['ibanDestinoTrans'] ?></td>
                    <td><?php echo $_POST['cantidadTransferencia'] ?>€</td>
                    <td><?php echo $comisionTrans?>€</td>
                    <td><?php echo $_SESSION['cuentaTransferencia']->saldo ?>€</td>
                    <td>
                        <?php
                        //Mostrar saldo post en rojo si es negativo
                        if ($saldoPostTrans<0)
                            echo "<p style='color:red;'>$saldoPostTrans €</p>";
                        else
                            echo "<p>$saldoPostTrans €</p>";
                        ?>

                    </td>

                </tr>
            </table>

            <!--Form confirmar-->
            <br>
            <form action="validar_transferencia.php" method="post">
                <input type="hidden" name="cantidadFinalTrans" value="<?php echo $cantidadFinal ?>">
                <input type="hidden" name="ibanDestinatariaTransf" value="<?php echo $_POST['ibanDestinoTrans'] ?>">
                <input type="submit" name="confirmarTransf" value="Confirmar" <?php if ($saldoPostTrans<0) echo 'disabled' ?>>
            </form>

        <?php
        }
        else
            echo "<p style='color:green'>Transferencia realizada con exito</p>";
        ?>    
        
        <a href='inicioCliente.php'>Volver a inicio</a><br>
        
        <!--Form logout-->
        <form action='logout.php' method='post'>
            <input type='submit' value='Salir'>
        </form>
        
    </body>
</html>
