<?php
require_once 'Conexion.php';
require_once '../modelo/Cuenta.php';

/**
 * Description of CuentaControlador
 *
 * @author DWES
 */
class CuentaControlador {
    
    //Obtener todas las cuentas de un usuario
    public static function getCuentasUsuario($dni){
        $conex=new Conexion();
        
        $resultado=$conex->query("SELECT * FROM cuentas WHERE dni_cuenta='$dni';");
        
        $cuentas=[];
        
        while ($registro=$resultado->fetch_object()){
            $cuenta=new Cuenta($registro->iban, $registro->saldo, $registro->dni_cuenta);
            $cuentas[]=$cuenta;
        }
        
        return $cuentas;
    }
}
