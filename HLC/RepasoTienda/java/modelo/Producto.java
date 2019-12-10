/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package modelo;

/**
 *
 * @author diurno
 */
public class Producto{
    private int codProducto;
    private String nombreProducto;
    private double precioProducto;

    public Producto(int codProducto, String nombreProducto, double precioProducto) {
        this.codProducto=codProducto;
        this.nombreProducto = nombreProducto;
        this.precioProducto = precioProducto;
    }

    
    @Override
    public String toString(){
        
        return this.nombreProducto + " " + this.precioProducto + "€";
    }
    
    public int getCodProducto() {
        return codProducto;
    }

    public void setCodProducto(int codProducto) {
        this.codProducto = codProducto;
    }
    
    public String getNombreProducto() {
        return nombreProducto;
    }

    public void setNombreProducto(String nombreProducto) {
        this.nombreProducto = nombreProducto;
    }

    public double getPrecioProducto() {
        return precioProducto;
    }

    public void setPrecioProducto(float precioProducto) {
        this.precioProducto = precioProducto;
    }
    
    
}
