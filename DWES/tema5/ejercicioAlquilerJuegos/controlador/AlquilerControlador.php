<?php
require_once 'Conexion.php';
require_once '../modelo/Alquiler.php';


class AlquilerControlador {
    
    //Crear registro para nuevo alquiler
    public static function insertAlquiler($codJuego, $dniCliente){
        $conex=new Conexion();
        
        //Fecha actual en formato Anno-Mes-Dia
        $fechaAlquiler=date("Y-m-d", time());
        
        //Fecha de alquiler mas 7 dias
        $fechaDev=date("Y-m-d", strtotime("+7 days"));
        
        $resultado=$conex->query("INSERT INTO alquiler VALUES('$codJuego', '$dniCliente', '$fechaAlquiler', '$fechaDev');");
        
        $conex->close();
        
        return $resultado;
    }
    
    //Obtener todos los alquileres
    public static function getAlquileres(){
        $conex=new Conexion();
        
        $resultados=$conex->query("SELECT * FROM alquiler WHERE Fecha_devol IS NOT NULL");
        
        $alquileres=[];
        
        while ($registro=$resultados->fetch_object()){
            $alquiler=new Alquiler($registro->Cod_juego, $registro->DNI_cliente, $registro->Fecha_alguiler, $registro->Fecha_devol);
            $alquileres[]=$alquiler;
        }
        
        return $alquileres;
    }
    
    //Obtener juegos alquilados por cliente
    public static function getAlquileresUsuario($dniCliente){
        $conex=new Conexion();
        
        $resultados=$conex->query("SELECT * FROM juegos j, alquiler a WHERE j.Codigo=a.Cod_juego AND a.DNI_cliente='$dniCliente' AND a.Fecha_devol IS NOT NULL;");
        
        $alquileres=[];
        
        while ($registro=$resultados->fetch_object()){
            $alquiler=new Alquiler($registro->Cod_juego, $registro->DNI_cliente, $registro->Fecha_alguiler, $registro->Fecha_devol);
            $alquileres[]=$alquiler;
        }
        
        if ($conex->errno)
            echo $conex->error;
        
        $conex->close();
        
        return $alquileres;
    }
    
    //Devolver juego
    public static function devolverJuego($codJuego, $fechaAlquiler, $dniUsu){
        $conex=new Conexion();
        
        $primerUpdate=$conex->query("UPDATE alquiler SET Fecha_devol=NULL WHERE Cod_juego='$codJuego' AND DNI_cliente='$dniUsu' AND Fecha_alguiler='$fechaAlquiler';");
        $segundoUpdate=$conex->query("UPDATE juegos SET alguilado='NO' WHERE Codigo='$codJuego';");
        
        if (!$primerUpdate || !$segundoUpdate)
            return false;

        return true;
    }
}
