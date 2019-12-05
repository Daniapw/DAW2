<?php
/**
 * Description of Usuario
 *
 * @author DWES
 */
class Usuario {
    private $dni;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $localidad;
    private $clave;
    private $tipo;
    
    public function __construct($dni, $nombre, $tipo, $apell = "", $direcc = "", $localidad = "", $clave = "") {
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellidos=$apell;
        $this->direccion=$direcc;
        $this->localidad=$localidad;
        $this->clave=$clave;
        $this->tipo=$tipo;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
    
}
