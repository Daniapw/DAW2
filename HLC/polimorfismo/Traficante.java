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
public abstract class Traficante extends Mafioso {
    protected int numOperaciones;

    /**
     * Constructor
     * @param nombre
     * @param apodo
     * @param banda
     * @param edad
     * @param nombreEjecutor
     * @param numOperaciones 
     */
    public Traficante(String nombre, String apodo, String banda, int edad, String nombreEjecutor, int numOperaciones){
        super(nombre, apodo, banda, edad, nombreEjecutor);
        this.numOperaciones=numOperaciones;
    }
    
    //Getters y setters
    public int getNumOperaciones() {
        return numOperaciones;
    }
    
    public void setNumOperaciones(int numOperaciones) {
        this.numOperaciones = numOperaciones;
    }
    
    @Override
    public String toString() {

        String str= "Nombre: "+ getNombre()
                +"\nApodo: " + getApodo()
                +"\nBanda: " + getBanda()
                +"\nEdad: " + getEdad()
                +"\nCondena: " + aLaTrena()
                +"\nNumero de operaciones: " + this.numOperaciones;
        
        if (isMuerto()){
            str=str+"\nEstado: muerto | Asesinado por: " + getNombreEjecutor();
        }
        else{
            str=str+"\nEstado: vivo";
        }
        
        return str;
    }
    
}
