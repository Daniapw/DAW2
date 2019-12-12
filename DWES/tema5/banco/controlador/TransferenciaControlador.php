<?php
require_once 'Conexion.php';
require_once '../modelo/Transferencia.php';

/**
 * Description of TransferenciaControlador
 *
 * @author DWES
 */
class TransferenciaControlador {
    
    //Obtener transferencias de una cuenta
    public static function getTransferencias($iban){
        $conex=new Conexion();
        
        $resultado=$conex->query("SELECT * FROM transferencias WHERE iban_origen='$iban';");
        
        $transferencias=[];
        
        while($registro=$resultado->fetch_object()){
            $transferencia=new Transferencia($registro->iban_origen, $registro->iban_destino, $registro->fecha, $registro->cantidad);
            $transferencias[]=$transferencia;
        }
        
        $conex->close();
        
        return $transferencias;
    }
    
}
