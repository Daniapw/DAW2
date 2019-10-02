/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package repasoObjetos.ejercicio4;

/**
 *
 * @author danir
 */
public class Jugador {
    private String nombre="";
    private int cash=0;
    
    public Jugador (String nombre, int cash){
        this.nombre=nombre;
        this.cash=cash;
    }

    
    //Metodo para restarCasb
    public void restarCash(int cantidad){
        if((cash-cantidad)<0)
            cash=0;
        else
            cash-=cantidad;
    }
    
    //Getters
    public String getNombre() {
        return nombre;
    }

    public int getCash() {
        return cash;
    }
    
    //Setters

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public void setCash(int cash) {
        this.cash = cash;
    }
    
    
}
