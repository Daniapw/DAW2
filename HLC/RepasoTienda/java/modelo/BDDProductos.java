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
        Producto producto1 = new Producto("Portatil Alienware", 670.8);
        Producto producto2 = new Producto("Raton Razer", 170.5);
        Producto producto3 = new Producto("Teclado Mecanico Corsair", 90.8);
        Producto producto4 = new Producto("Auriculares Inalambricos Sennheiser", 114.8);
        Producto producto5 = new Producto("Ventilador PC Templar", 21.8);
        
        this.add(producto1);
        this.add(producto2);
        this.add(producto3);
        this.add(producto4);
        this.add(producto5);
    }
    
}
