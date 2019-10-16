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
public class Soplon extends Mafioso{
    private int numSoplos;

    /**
     * Constructor
     * @param nombre
     * @param apodo
     * @param banda
     * @param edad
     * @param nombreEjecutor
     * @param numSoplos 
     */
    public Soplon(String nombre, String apodo, String banda, int edad, String nombreEjecutor, int numSoplos){
        super(nombre, apodo, banda, edad, nombreEjecutor);
        this.numSoplos=numSoplos;
    }
    
    @Override
    public String aLaTrena() {
        return "Al soplon " + this.getNombre() + " '" + this.getApodo() + "' le caeran " + numSoplos + " meses de carcel";
    }

    @Override
    public String toString() {

        String str= "Nombre: "+ getNombre()
                +"\nApodo: " + getApodo()
                +"\nBanda: " + getBanda()
                +"\nEdad: " + getEdad()
                +"\nCondena: " + aLaTrena()
                +"\nNumero de soplos a la mafia: " + numSoplos;
        
        if (isMuerto()){
            str=str+"\nEstado: muerto | Asesinado por: " + getNombreEjecutor();
        }
        else{
            str=str+"\nEstado: vivo";
        }
        
        return str;
    }
    
    //Getters y setters
    public int getNumSoplos() {
        return numSoplos;
    }

    public void setNumSoplos(int numSoplos) {
        this.numSoplos = numSoplos;
    }
    
    
    
}
