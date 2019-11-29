<?php

require_once 'Conexion.php';

class ProductoE {
    private $codigo;
    private $nombre;
    private $precio;
    
    public function __construct($codigo=0, $nombre="", $precio=0) {
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->precio=$precio;
    }
    
    //Para reutilizar objeto
    public function nuevoProducto($codigo, $nombre, $precio){
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->precio=$precio;
    }
    
    //Insertar en BDD
    public function insert(){
        $conex=new Conexion();
        $error=true;
        
        //Si hay un error de conexion
        if($conex->connect_errno)
            $error=$conex->connect_error;
        //Si no lo hay
        else{
            $conex->query("INSERT INTO productos VALUES($this->codigo, '$this->nombre', $this->precio);");
            
            //Si hay un error SQL
            if ($conex->errno)
                $error=$conex->error;
            
            $conex->close();
        }
        
        //Se devuelve el error
        return $error;
    }
    
    //Recuperar un producto mediante el codigo
    public static function getProductoByCodigo($cod){
        $conex=new Conexion();
        
        $resultado=$conex->query("SELECT * FROM productos WHERE codigo=$cod");
        
        if ($conex->affected_rows){
            $objetoRes=$resultado->fetch_object();
            
            $p=new self($objetoRes->codigo, $objetoRes->nombre, $objetoRes->precio);
            
            $conex->close();
            
            return $p;
        }
        
        return false;
    }
    
    //Recuperar todos los productos
    public static function getAllProductos(){
        $conex=new Conexion();
        
        $resultado=$conex->query("SELECT * FROM productos");
        
        if ($conex->affected_rows){
            while($registro=$resultado->fetch_object()){
                $array[]=new self($registro->codigo, $registro->nombre, $registro->precio);
            }
            
            return $array;
        }
        
        return false;
    }
    
    public function __toString() {
        return "Nombre: $this->nombre <br>"
                . "Codigo: $this->codigo <br>"
                . "Precio: $this->precio";
    }
}
