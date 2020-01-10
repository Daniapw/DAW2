<?php

//Comunicacion con el servidor SOAP
require_once 'vendor/autoload.php';

class Client {
    private $_soapClient=null;
    
    public function __construct() {
        $this->_soapClient=new nusoap_client('http://localhost/EjercicioTema6NuSOAP/Server.php?wsdl');
    }
    
    /*El código anterior sólo crea la instancia de nusoap_client y le pasamos el
    * endpoit, que es la url del servidor, de esta forma el cliente sabrá a qué
    * servidor debe enviar las peticiones.*/
     /*A continuación vamos a definir tres métodos dentro de la clase Client, que
    * será peticiones a nuestro servidor*/

    public function getPVP($codigoProd){
        $resultado= $this->_soapClient->call('Funciones.getPVP',array('codigo'=>$codigoProd));
        return $resultado;
    }
    
    public function getStock($codigoProd, $codTienda){
        $resultado= $this->_soapClient->call('Funciones.getStock',array('codigoProd'=>$codigoProd, 'codTienda'=>$codTienda));
        return $resultado;
    }
    
    public function getFamilias(){
        $resultado= $this->_soapClient->call('Funciones.getFamilias',array());
        return $resultado;
    }
    
    public function getProductosFamilia($codFamilia){
        $resultado= $this->_soapClient->call('Funciones.getProductosFamilia',array('codigoFamilia'=>$codFamilia));
        return $resultado;
    }
}
