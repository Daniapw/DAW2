<?php
require_once 'Conexion.php';
require_once '../modelo/Alquiler.php';

class AlquilerControlador {
    
    public static function insertAlquiler($codJuego, $dniCliente){
        $conex=new Conexion();
        
        $fechaAlquiler=date("Y-m-d", time());
        
        $fechaDev=date("Y-m-d", strtotime("+7 days"));
        
        $conex->query("INSERT INTO alquiler VALUES('$codJuego', '$dniCliente', '$fechaAlquiler', '$fechaDev'");

        $conex->close();
    }
}
