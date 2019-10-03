//Constructor Empresa
function Empresa(nombre, direccion, telefono, nif){
    this.nombre= nombres;
    this.direccion= direccion;
    this.telefono= telefono;
    this.nif=nif;
}

//Constructor Cliente
function Cliente(numCliente, dni, nombre, domicilio, cp, ciudad, provincia){
    this.numCliente = numCliente;
    this.dni= dni;
    this.nombre= nombre;
    this.domicilio= domicilio;
    this.cp=cp;
    this.ciudad=ciudad;
    this.provincia=provincia;
}

//Constructor Producto
function Producto(descripcion, precio){
    this.descripcion=descripcion;
    this.precio=precio;
}

//Constructor Factura
function Factura(empresa, cliente, productos, importe, formaPago){
    this.empresa=empresa;
    this.cliente=cliente;
    this.productos=productos;
    this.importe=importe;
    this.formaPago=formaPago;

    //Funcion importe
    this.calcularImporte = function(){
        total=0;
        this.productos.forEach(element => {
            total+=element.precio;
        });
        this.importe=total;
    };
    
}


//Funcion para mostrar importe por pantalla
Factura.prototype.mostrarImporte=function(){
    document.write("Importe: " + this.importe);
}