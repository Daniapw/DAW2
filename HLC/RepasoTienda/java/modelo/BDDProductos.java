/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package modelo;

import java.util.ArrayList;

/**
 *
 * @author diurno
 */
public class BDDProductos extends ArrayList<Producto>{
    
    
    public BDDProductos() {
        Producto producto1 = new Producto(1, "Portatil Alienware", 670.8);
        Producto producto2 = new Producto(2, "Raton Razer", 170.5);
        Producto producto3 = new Producto(3, "Teclado Mecanico Corsair", 90.8);
        Producto producto4 = new Producto(4, "Auriculares Inalambricos Sennheiser", 114.8);
        Producto producto5 = new Producto(5, "Ventilador PC Templar", 21.8);
        
        this.add(producto1);
        this.add(producto2);
        this.add(producto3);
        this.add(producto4);
        this.add(producto5);
    }
    
    //Buscar producto
    public Producto getProducto(int codigo){
        
        for (Producto producto:this){
            
            if (producto.getCodProducto()==codigo)
                return producto;
        }
        
        return null;
    }
    
    
    public String toString(){
        StringBuffer str=new StringBuffer();
        
        for (Producto producto:this){
             str.append(
                "<form action='TiendaServlet' method='post'>"
                    + "<p>" + producto.toString()+ "</p>"
                    + "<input type='hidden' name='codProductoTienda' value='"+producto.getCodProducto()+"'>"
                    + "<input type='submit' name='agregarProductoCarrito' value='Agregar al carrito'>"
              + "</form>");
        }

        
        return str.toString();
    }
}
