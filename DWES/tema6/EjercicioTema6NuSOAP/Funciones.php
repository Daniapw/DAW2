<?php
class Funciones {
    
    /**
     * Obtener conexion a bd
     * @return type
     */
    public function getConex(){
        return $conex=new mysqli('localhost','dwes', 'abc123.', 'dwes');
    }

    /**
     * Obtener precio producto
     * @param type $codigo
     * @return type
     */
    public function getPVP($codigo){
        $conex=$this->getConex();

        $resultado=$conex->query("SELECT * FROM producto WHERE cod='$codigo';");

        $objeto=$resultado->fetch_object();

        $conex->close();

        return $objeto->PVP;
    }

    /**
     * Obtener stock de un producto en una tienda
     * @param type $codigoProd
     * @param type $codTienda
     * @return type
     */
    public function getStock($codigoProd, $codTienda){
        $conex=$this->getConex();

        $resultado=$conex->query("SELECT * FROM stock WHERE producto='$codigoProd' AND tienda=$codTienda;");

        $objeto=$resultado->fetch_object();

        $conex->close();

        return $objeto->unidades;
    }

    /**
     * Obtener familias de productos
     * @return type
     */
    public function getFamilias(){
        $conex=$this->getConex();

        $resultado=$conex->query("SELECT cod FROM familia;");

        $familias=[];

        while($familia=$resultado->fetch_object()){
            $familias[]=$familia->cod;
        }

        $conex->close();

        return $familias;
    }

    /**
     * Obtener productos de una familia concreta
     * @param type $codigoFamilia
     * @return type
     */
    public function getProductosFamilia($codigoFamilia){
        $conex=$this->getConex();

        $resultado=$conex->query("SELECT * FROM producto WHERE familia='$codigoFamilia';");

        $productos=[];

        while($producto=$resultado->fetch_object()){
            $productos[]=$producto->cod;
        }

        $conex->close();

        return $productos; 
    }
}
