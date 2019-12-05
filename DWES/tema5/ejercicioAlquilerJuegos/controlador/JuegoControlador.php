<?php
require_once 'Conexion.php';
require_once '../modelo/Juego.php';

class JuegoControlador {
    
    //Get all juegos
    public static function getAllJuegos(){
        $conex=new Conexion();
        
        $resultados=$conex->query("SELECT * FROM juegos");
        
        if ($conex->errno!=null){
            echo $conex->error;
        }
        
        $conex->close();
        
        return $resultados;
    }
    
    //Get Juego especifico
    public static function getJuego($cod){
        $conex=new Conexion();
        
        $resultado=$conex->query("SELECT * FROM juegos WHERE Codigo='$cod';");
        
        $registro=$resultado->fetch_object();
        
        $juego=new Juego($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alguilado);
        
        $conex->close();
        
        return $juego;
    }
    
    //Get juegos alquilados
    public static function getJuegosAlquilados(){
        $conex=new Conexion();
        
        $resultados=$conex->query("SELECT * FROM juegos WHERE alguilado='SI'");
        
        if ($conex->errno!=null){
            echo $conex->error;
        }
        
        $conex->close();
        
        return $resultados;
    }
    
        
    //Get juegos alquilados
    public static function getJuegosDisponibles(){
        $conex=new Conexion();
        
        $resultados=$conex->query("SELECT * FROM juegos WHERE alguilado='NO'");
        
        if ($conex->errno!=null){
            echo $conex->error;
        }
        
        $conex->close();
        
        return $resultados;
    }
    
    //Actualizar juego alquilado
    public static function updateEstadoAlquiler($codJuego, $estadoAlquiler){
        
        $conex=new Conexion();
        
        $resultados=$conex->query("UPDATE juegos SET alguilado='$estadoAlquiler' WHERE Codigo='$codJuego'");
        
        if ($conex->errno!=null){
            echo $conex->error;
        }
        
        $conex->close();
        
        return $resultados;
    }
    
    //Funcion para mostrar juegos en index
    public static function mostrarJuegosIndex(){
        $juegos=self::getAllJuegos();
        
        while ($registro=$juegos->fetch_object()){
            $juego=new Juego($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alguilado);

            echo $juego->mostrarFormatoIndex();
        }
    }
}
