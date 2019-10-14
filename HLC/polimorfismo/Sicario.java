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
public class Sicario extends Mafioso {
    private int numAsesinatos;

    /**
     * Constructor
     * @param nombre
     * @param apodo
     * @param banda
     * @param edad
     * @param nombreEjecutor
     * @param numAsesinatos 
     */
    public Sicario(String nombre, String apodo, String banda, int edad, String nombreEjecutor, int numAsesinatos){
        super(nombre, apodo, banda, edad, nombreEjecutor);
        this.numAsesinatos=numAsesinatos;
    }
    
    @Override
    public String aLaTrena() {
        return "Al sicario " + this.getNombre() + " '" + this.getApodo() + "' le caeran " + numAsesinatos*15 + " anios de carcel";
    }

    //Getters y setters
    public int getNumAsesinatos() {
        return numAsesinatos;
    }

    public void setNumAsesinatos(int numAsesinatos) {
        this.numAsesinatos = numAsesinatos;
    }
    
    
}
