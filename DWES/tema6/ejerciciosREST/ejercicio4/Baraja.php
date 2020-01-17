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
     * 
     * @param type $numeroCartas
     */
    public function getCartasAleatorias($numeroCartas){
        $arrayNumeros=[];
        
        for ($i=0; $i<$numeroCartas; $i++){
            
            do{
                $numAleatorio= rand(1, 40);
                
            }while(in_array($numAleatorio, $arrayNumeros));
            
            $arrayNumeros[]=$numAleatorio;
        }
        
    }

}
