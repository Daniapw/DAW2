<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transferencia
 *
 * @author DWES
 */
class Transferencia {
    private $ibanOrigen;
    private $ibanDestino;
    private $fecha;
    private $cantidad;
    CONST COMISION=1;
    
    public function __construct($ibanOrigen, $ibanDestino, $cantidad, $fecha="") {
        $this->ibanOrigen=$ibanOrigen;
        $this->ibanDestino=$ibanDestino;
        $this->fecha=$fecha;
        $this->cantidad=$cantidad;
    }
    
    //Obtener fecha de transferencia formateada
    public function getFechaFormateada(){
        $fechaFormateada=date("Y-m-d h:i:s",$this->fecha);
        
        return $fechaFormateada;
    }
    
    //Comprobar si la transferencia es posible
    public static function calcularTransferencia($cantidadTrans){
                
        return $cantidadTrans+self::calcularComisionTrans($cantidadTrans);
    }
    
    public static function calcularComisionTrans($cantidad){
        return ($cantidad*self::COMISION)/100;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
}
