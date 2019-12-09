<?php

/**
 * Description of Alquiler
 *
 * @author DWES
 */
class Alquiler {
    private $codJuego;
    private $dniCliente;
    private $fechaAlquiler;
    private $fechaDevol;
    
    function __construct($codJuego, $dniCliente, $fechaAlquiler, $fechaDevol) {
        $this->codJuego = $codJuego;
        $this->dniCliente = $dniCliente;
        $this->fechaAlquiler = $fechaAlquiler;
        $this->fechaDevol = $fechaDevol;
    }

    //Calcular precio
    public function calcularPrecio(){
        $precio=5;
        
        //Fecha alquiler
        $fechaDev=new DateTime($this->fechaDevol);
        
        //Fecha actual
        $fechaAct=date("Y-m-d", time());
        
        $fechaAct=new DateTime($fechaAct);


        if ($fechaAct>$fechaDev){
            $dias=$fechaDev->diff($fechaAct);
            
            $precio+=$dias->d;
        }
        
        return $precio;
    }
    
    
    public function __get($name) {
      return $this->$name;  
    }

    public function __set($name, $value) {
        $this->$name=$value;
    }

}
