//Constructor Empresa
function Empresa(nombre, direccion, telefono, nif){
    this.nombre= "PCComponentes";
    this.direccion= "C/ Lorem Ipsum 1, Madrid";
    this.telefono= "957957957";
    this.nif="11111111";
}

//Constructor Cliente
function Cliente(numCliente, dni, nombre, domicilio, cp, ciudad, provincia){
    this.numCliente = 1,
    this.dni= "50614387D";
    this.nombre= "Daniel";
    this.domicilio= "C/ La Estrella";
    this.cp="14900";
    this.ciudad="Lucena";
    this.provincia="Cordoba";
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
    
}

//Funcion para calcular importe
Factura.prototype.calcularImporte=function(){
    total=0;
    this.productos.forEach(element => {
        total+=element.precio;
    });
    this.importe=total;
}

//Funcion para mostrar importe por pantalla
Factura.prototype.mostrarImporte=function(){
    document.write("Importe: " + this.importe);
}