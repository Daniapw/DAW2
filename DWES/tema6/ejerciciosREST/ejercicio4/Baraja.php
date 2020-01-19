<?php

require_once 'Carta.php';

/**
 * Description of Baraja
 *
 * @author DWES
 */
class Baraja {
    public $cartas=[];
    public static $PALOS=['Oros', 'Bastos', 'Copas', 'Espadas'];
    public static $FIGURAS=['As', '2', '3', '4', '5', '6' ,'7' ,'Sota', 'Caballo', 'Rey'];
    
    public function __construct() {
        
        //Crear cartas de todos los palos
        //Recorrer palos
        foreach(self::$PALOS as $palo){
            
            //Recorrer figuras
            foreach(self::$FIGURAS as $figura){
                $this->cartas[]=new Carta($figura, $palo);
            }
            
        }
    }
    
    /**
     * Obtener cartas aleatorias
     * @param type $numeroCartas
     */
    public function getCartasAleatorias($numeroCartas){
        $arrayNumeros=[];
        $arrayCartas=[];
        
        //Generar array de numeros aleatorios
        for ($i=0; $i<$numeroCartas; $i++){
            
            do{
                $numAleatorio= rand(0, 39);
                
            }while(in_array($numAleatorio, $arrayNumeros));
            
            $arrayNumeros[]=$numAleatorio;
        }
        
        //Obtener cartas
        foreach ($arrayNumeros as $numero){
            $arrayCartas[]=$this->cartas[$numero];
        }
        
        return $arrayCartas;
    }

}
