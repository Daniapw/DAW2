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
public class TraficanteAlcohol extends Traficante{

    /**
     * Constructor
     * @param nombre
     * @param apodo
     * @param banda
     * @param edad
     * @param nombreEjecutor
     * @param numOperaciones 
     */
    public TraficanteAlcohol(String nombre, String apodo, String banda, int edad, String nombreEjecutor, int numOperaciones){
        super(nombre, apodo, banda, edad, nombreEjecutor, numOperaciones);
    }
    
    @Override
    public String aLaTrena() {
        return "Al traficante de alcohol " + this.getNombre() + " '" + this.getApodo() + "' le caeran " + this.numOperaciones*2.5 + " anios de carcel";
    }
    
}
