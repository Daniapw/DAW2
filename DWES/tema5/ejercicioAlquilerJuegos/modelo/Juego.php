<?php

/**
 * Description of Juego
 *
 * @author DWES
 */
class Juego {
    private $codigo;
    private $nombreJuego;
    private $nombreConsola;
    private $anno;
    private $precio;
    private $alquilado;
    private $imagen;
    
    public function __construct($codigo, $nombreJuego, $nombreConsola, $anno, $precio, $alquilado, $imagen="caratula.jpg") {
        $this->codigo=$codigo;
        $this->nombreJuego=$nombreJuego;
        $this->nombreConsola=$nombreConsola;
        $this->anno=$anno;
        $this->precio=$precio;
        $this->alquilado=$alquilado;
        $this->imagen=$imagen;
    }
    
    //Mostrar juego en index.php
    public function mostrarFormatoIndex(){
        return 
        "<div class='juegoIndex'>"
        . "<a href='alquilar.php?juego=$this->codigo'><img src='../assets/img/$this->imagen' class='imagenCaratula'></a>"
        . "<div><p>$this->nombreJuego</p></div>"
      . "</div>";
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
}
