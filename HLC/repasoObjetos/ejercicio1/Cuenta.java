/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package repasoObjetos.ejercicio1;

/**
 *
 * @author danir
 */
public class Cuenta {
    private String titular;
    private double cantidad;
    
    //Constructor 1
    public Cuenta(String titular, double cantidad){
        this.titular=titular;
        this.cantidad=cantidad;
    }
    
    //Constructor 2
    public Cuenta(String titular){
        this.titular=titular;
        this.cantidad=0;
    }
    
    //Metodo ingresar
    public void ingresar(double cantidad){
        if (cantidad>0){
            this.cantidad+=cantidad;
        }
    }
    
    //Metodo retirar
    public void retirar(double cantidad){
        
        if ((getCantidad()-cantidad)<0){
            this.cantidad=0;
        }
        else{
            this.cantidad-=cantidad;
        }
        
        
    }
    
    
    //Getters y setters
    public String getTitular(){
        return this.titular;
    }
    
    public void setTitular(String titular){
        this.titular=titular;
    }
    
    public double getCantidad(){
        return this.cantidad;
    }
    
    public void setCantidad(double titular){
        this.cantidad=titular;
    }

    //toString
    @Override
    public String toString() {
        return "Titular: " + titular +
                "\nCantidad: " + cantidad;
    }
    
    
}
