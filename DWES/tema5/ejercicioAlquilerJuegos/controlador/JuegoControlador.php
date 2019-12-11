<?php
require_once 'Conexion.php';
require_once '../modelo/Juego.php';

class JuegoControlador {
    
    
    //Insertar juego en BD
    public static function insertJuego($juego){
        $conex=new Conexion();
        
        $resultado=$conex->query("INSERT INTO juegos VALUES('$juego->codigo', '$juego->nombreJuego', '$juego->nombreConsola', $juego->anno, $juego->precio, '$juego->alquilado', '$juego->imagen')");
                
        $conex->close();
        
        return $resultado;
    }
    
    //Eliminar juego
    public static function eliminarJuego($codJuego){
        $conex=new Conexion();
        
        $resultado=$conex->query("DELETE FROM juegos WHERE Codigo='$codJuego';");
        
        $conex->close();
        
        return $resultado;
    }
    
    //Modificar juego
    public static function updateJuego($juego){
        $conex=new Conexion();
        
        $conex->query("UPDATE juegos SET Nombre_juego='$juego->nombreJuego', Nombre_consola='$juego->nombreConsola',"
                . " Anno=$juego->anno, Precio=$juego->precio, Alguilado='$juego->alquilado', Imagen='$juego->imagen' WHERE Codigo='$juego->codigo';");
        
        if ($conex->errno)
            return false;
        
        $conex->close();
        
        return true;
    }
    
    //Get all juegos
    public static function getAllJuegos(){
        $conex=new Conexion();
        
        $resultados=$conex->query("SELECT * FROM juegos");
        
        $juegos=[];
        
        while ($registro=$resultados->fetch_object()){
            $juego=new Juego($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alguilado, $registro->Imagen);

            $juegos[]=$juego;
        }
        
        $conex->close();
        
        return $juegos;
    }
    
    //Get Juego especifico
    public static function getJuego($cod){
        $conex=new Conexion();
        
        $resultado=$conex->query("SELECT * FROM juegos WHERE Codigo='$cod';");
        
        
        if ($conex->affected_rows){
            $registro=$resultado->fetch_object();

            $juego=new Juego($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alguilado, $registro->Imagen);
        }
        else
            $juego=false;
        
        $conex->close();
        
        return $juego;
    }
    
    //Get juegos alquilados
    public static function getJuegosAlquilados(){
        $conex=new Conexion();
        
        $resultados=$conex->query("SELECT * FROM juegos WHERE alguilado='SI'");
        
        $juegos=[];
        
        while ($registro=$resultados->fetch_object()){
            $juego=new Juego($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alguilado, $registro->Imagen);

            $juegos[]=$juego;
        }
        
        $conex->close();
        
        return $juegos;
    }
    
        
    //Get juegos disponibles
    public static function getJuegosDisponibles(){
        $conex=new Conexion();
        
        $resultados=$conex->query("SELECT * FROM juegos WHERE alguilado='NO'");
        
        $juegos=[];
        
        while ($registro=$resultados->fetch_object()){
            $juego=new Juego($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alguilado, $registro->Imagen);

            $juegos[]=$juego;
        }
        
        $conex->close();
        
        return $juegos;
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
    
    //Subir imagen caratula y obtener nombre del fichero en servidor
    public static function subirCaratula($nombreArchivo){
        //Concatenar tiempo UNIX actual + nombre del fichero para que no haya dos ficheros con el mismo nombre
        //El tiempo debe ir delante para que el fichero no pierda la extension
        $nombreFichero=time()."-".$_FILES[$nombreArchivo]['name'];

        //Ruta en la que se va a guardar el fichero
        $ruta="../assets/img/".$nombreFichero;

        //Mover fichero subido a la ruta indicada
        move_uploaded_file($_FILES[$nombreArchivo]['tmp_name'], $ruta);
        
        return $nombreFichero;
    }
    
}
