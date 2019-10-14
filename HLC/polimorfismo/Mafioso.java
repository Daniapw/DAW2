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
public abstract class Mafioso {
    private String nombre;
    private String apodo;
    private String banda;
    private int edad;
    private String nombreEjecutor;

    
    /**
     * Constructor
     * @param nombre
     * @param apodo
     * @param banda
     * @param edad
     * @param nombreEjecutor 
     */
    
    public Mafioso(String nombre, String apodo, String banda, int edad, String nombreEjecutor) {
        this.nombre = nombre;
        this.apodo = apodo;
        this.banda = banda;
        this.edad = edad;
        this.nombreEjecutor = nombreEjecutor;
    }
    
    
    
    /**
     * Metodo abstracto para calcular anios de carcel
     */
    public abstract String aLaTrena();
    
    /**
     * Metodo para guardar sicario que ha ejecutado al mafioso
     * @param sicario 
     */
    public void ejecutadoPor(Sicario sicario){
        this.nombreEjecutor=sicario.getNombre() + " '" + sicario.getApodo() + "'";
    }

    //Getters y setters
    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApodo() {
        return apodo;
    }

    public void setApodo(String apodo) {
        this.apodo = apodo;
    }

    public String getBanda() {
        return banda;
    }

    public void setBanda(String banda) {
        this.banda = banda;
    }

    public int getEdad() {
        return edad;
    }

    public void setEdad(int edad) {
        this.edad = edad;
    }

    public String getNombreEjecutor() {
        return nombreEjecutor;
    }

    public void setNombreEjecutor(String nombreEjecutor) {
        this.nombreEjecutor = nombreEjecutor;
    }
    
    
}
