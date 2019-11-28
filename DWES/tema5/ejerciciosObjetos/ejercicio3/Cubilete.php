<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cubilete
 *
 * @author danir
 */
class Cubilete {
    private $dados=[];
    
    public function __construct() {
        for ($i=0; $i<5; $i++){
            $this->dados[$i]=new DadoPoker();
        }
    }
    
    //Funcion para tirar dados
    public function tirarDados(){
        
        foreach($this->dados as $key=>$dado){
            $dado->tira();
        }
        
    }
    
    //Funcion para mostrar resultados
    public function mostrarResultados(){
        $str="<ul>";
        
        foreach($this->dados as $key=>$dado){
            $str.="<li> Dado ".($key+1).": ".$dado->nombreFigura()."</li>";
        }
        
        $str.="</ul>";
        
        return $str;
    }
}
