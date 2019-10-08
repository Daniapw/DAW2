//Constructor Empresa
function Empresa(nombre, direccion, telefono, nif){
    this.nombre= nombre;
    this.direccion= direccion;
    this.telefono= telefono;
    this.nif=nif;

    this.toString=function(){
        return "<h2>Empresa</h2>"+
        "Nombre: " + nombre +"<br>"
        +"Direccion: " + direccion + "<br>"
        +"Telefono: " + telefono + "<br>"
        +"NIF: " + nif;
    }
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

    this.toString=function(){
        return "<h2>Cliente</h2>"+
        "Nombre: " + nombre +"<br>"
        +"Domicilio: " + domicilio + "<br>"
        +"DNI: " + dni + "<br>"
        +"Ciudad: " + ciudad + "<br>"
        +"Provincia: " + provincia + "<br>"
        +"CP: " + cp + "<br>"
        +"Numero cliente: " + numCliente;
    };
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

    //Funcion mostrar en tabla
    this.imprimirFactura=function(){
        document.write(cliente.toString());
        document.write("<br>Forma de pago: " + this.formaPago);
        document.write(empresa.toString() +"<br>");
        
        document.write(
            "<table border='1' id='tablaProductos'>" +
                "<tr><td colspan='2'><h2>Productos</h2></td></tr>"+
                "<tr>"+
                    "<th>Descripcion</th>"+
                    "<th>Precio (€)</th>"+
                "</tr>"
        );
        
        //Imprimir lineas productos
        this.productos.forEach(producto=>{
            document.write(
                "<tr>"+
                    "<td>"+producto.descripcion+"</td>"+
                    "<td>"+producto.precio+"</td>"+
                "</tr>"
            )
        });

        //Importe
        document.write(
                "<tr>"+
                    "<th>Importe total</th>"+
                    "<th>"+this.importe+"</th>"+
                "</tr>" +
            "</table>"
        );
        
    };
    
}


//Funcion para mostrar importe por pantalla
Factura.prototype.mostrarImporte=function(){
    document.write("Importe: " + this.importe);
}