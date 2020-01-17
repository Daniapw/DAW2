<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Funciones
 *
 * @author DWES
 */
class Funciones {
    
    /**
     * EUR a USD y GBP
     * @param type $cantidad
     * @return type
     */
    public static function eurosADolaresYLibras($cantidad){
        $valores=[
            "USD"=>self::eurosADolares($cantidad)['USD'],
            "GBP"=>self::eurosALibras($cantidad)['GBP']
        ];
        
        return $valores;
    }
    
    /**
     * USD a EUR y GBP
     * @param type $cantidad
     * @return type
     */
    public static function dolaresAEurosYLibras($cantidad){
        $valores=[
            "EUR"=>self::eurosADolares($cantidad)['EUR'],
            "GBP"=>self::eurosALibras($cantidad)['GBP']
        ];
        
        return $valores;
    }

    /**
     * GBP a EUR y USD
     * @param type $cantidad
     * @return type
     */
    public static function librasAEurosYDolares($cantidad){
        $valores=[
            "EUR"=>self::librasAEuros($cantidad)['EUR'],
            "USD"=>self::librasADolares($cantidad)['USD']
        ];
        
        return $valores;
    }
    
    /**
     * EUR a GBP
     * @param type $cantidad
     * @return type
     */
    public static function eurosALibras($cantidad){
        
        $valores=[
            "GBP"=>$cantidad*0.85
        ];
        
        return $valores;
    }
    
    /**
     * Euros a dolares
     * @param type $cantidad
     * @return type
     */
    public static function eurosADolares($cantidad){
        $valores=[
            "USD"=>$cantidad*1.11
        ];
        
        return $valores;
    }
    
    /**
     * USD a EUR
     * @param type $cantidad
     * @return type
     */
    public static function dolaresAEuros($cantidad){
        $valores=[
            "EUR"=>$cantidad*0.9
        ];
        
        return $valores;
    }
    
    /**
     * USD a GBP
     * @param type $cantidad
     * @return type
     */
    public static function dolaresALibras($cantidad){
        $valores=[
            "GBP"=>$cantidad*0.77
        ];
        
        return $valores;
    }
    
    /**
     * GBP a EUR
     * @param type $cantidad
     * @return type
     */
    public static function librasAEuros($cantidad){
        $valores=[
            "EUR"=>$cantidad*1.17
        ];
        
        return $valores;
    }
    
    /**
     * GBP a USD
     * @param type $cantidad
     * @return type
     */
    public static function librasADolares($cantidad){
        $valores=[
            "USD"=>$cantidad*1.31
        ];
        
        return $valores;
    }
}
