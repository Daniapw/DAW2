<?php

require_once 'vendor/autoload.php';
require_once('Funciones.php');

class Server {
    private $urlServer='http://localhost/EjercicioTema6NuSOAP/Server.php';
    private $_soapServer = null;

    public function __construct() {
        $this->_soapServer=new nusoap_server;
        $this->_soapServer->configureWSDL("WDSL Tarea 6 Productos",$this->urlServer);
        $this->_soapServer->wsdl->schemaTargetNamespace=$this->urlServer;

        /* Registrar puntos de entrada a nuestro Webservice: Para dar acceso al cliente, debemos utilizar el método
        register dentro del constructor que hemos creado anteriormente. */
        
        //Registrar getPVP
        $this->_soapServer->register(
            'Funciones.getPVP', // method name
            array('codigo'=>'xsd:String'), // input parameters
            array('return' => 'xsd:float'), // output parameters
            false, // namespace
            false, // soapaction
            'rpc', // style
            'encoded', // use
            'Servicio que devuelve el precio de un producto' // documentation
        );
        
        //Registrar getStock
        $this->_soapServer->register(
            'Funciones.getStock', // method name
            array('codigoProd'=>'xsd:String', 'codTienda'=>'xsd:int'), // input parameters
            array('return' => 'xsd:int'), // output parameters
            false, // namespace
            false, // soapaction
            'rpc', // style
            'encoded', // use
            'Servicio que devuelve el stock de un producto en una tienda determinada' // documentation
        );
        
        //Registrar getFamilias
        $this->_soapServer->register(
            'Funciones.getFamilias', // method name
            array(), // input parameters
            array('return' => 'xsd:Array'), // output parameters
            false, // namespace
            false, // soapaction
            'rpc', // style
            'encoded', // use
            'Servicio que devuelve las familias de productos disponibles' // documentation
        );
        
        //Registrar getProductosFamilia
        $this->_soapServer->register(
            'Funciones.getProductosFamilia', // method name
            array('codigoFamilia'=>'xsd:int'), // input parameters
            array('return' => 'xsd:Array'), // output parameters
            false, // namespace
            false, // soapaction
            'rpc', // style
            'encoded', // use
            'Servicio que devuelve los productos de una familia determinada' // documentation
        );

        //Procesamos el webservice
        $this->_soapServer->service(file_get_contents("php://input"));
    }
    
}

$server=new Server();
