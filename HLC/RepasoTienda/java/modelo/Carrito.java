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
public class Carrito extends ArrayList<Producto> {

    public Carrito() {}

    //Listar productos del carro
    @Override
    public String toString(){
        StringBuffer str=new StringBuffer();
        
        if (this.isEmpty())
            str.append("<p>No hay ningun producto en el carrito</p>");
        else{
            
            for (Producto producto:this){
                str.append(producto.toString()+"<br>");
            }   
        }
        
        return str.toString();
    }
}
