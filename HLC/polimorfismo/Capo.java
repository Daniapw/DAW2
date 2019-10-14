/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectopararun.polimorfismo;

/**
 *
 * @author danir
 */
public class Capo extends Mafioso {
    int barriosControlados=1;
    
    /**
     * Constructor
     * @param nombre
     * @param apodo
     * @param banda
     * @param edad
     * @param nombreEjecutor
     * @param barrios 
     */
    public Capo(String nombre, String apodo, String banda, int edad, String nombreEjecutor, int barrios){
        super(nombre, apodo, banda, edad, nombreEjecutor);
        
        this.barriosControlados=barrios;
    }
    
    @Override
    public String aLaTrena() {
        return "Al capo " + this.getNombre() + " '" + this.getApodo() + "' le caeran " + barriosControlados*5 + " anios de carcel";
    }

    //Getters y setters
    public int getBarriosControlados() {
        return barriosControlados;
    }

    public void setBarriosControlados(int barriosControlados) {
        this.barriosControlados = barriosControlados;
    }
    
    
}
