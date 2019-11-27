<?php

class Persona{
    protected $nombre;
    protected $apellidos;
    protected $edad;
    protected static $numPersonas=0;
    
    //Metodo magico constructor con valores por defecto (el constructor por defecto no existe en PHP)
    public function __construct($nom="", $apell="", $ed=18) {
        $this->nombre=$nom;
        $this->apellidos=$apell;
        $this->edad=$ed;
        self::$numPersonas++;
    }
    
    //Metodo estatico que devuelve el valor del atributo estatico privado numPersonas
    public static function personas(){
        return self::$numPersonas;
    }
    
    public function newPersona($nom, $apell, $ed){
        $this->nombre=$nom;
        $this->apellidos=$apell;
        $this->edad=$ed;
    }
    
    //Sobrecarga con metodo magico
    public function __call($name, $arguments){
        if ($name=="muestra"){
            if (count($arguments)==1){
                echo "El nombre de la persona es $this->nombre";
            }
            if (count($arguments)==2){
                echo "El nombre y apellidos de la persona son $this->nombre $this->apellidos";
            }
        }
    }
    
    //Metodos magicos para getters y setters
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
    
    //Metodo magico toString
    public function __toString() {
        return "NOMBRE: $this->nombre <br>"
                . "APELLIDOS: $this->apellidos <br>"
                . "EDAD: $this->edad";
    }
}

