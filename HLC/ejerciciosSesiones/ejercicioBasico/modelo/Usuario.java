/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ejercicioBasico.modelo;

/**
 *
 * @author diurno
 */
public class Usuario {
    private String nombre;
    private String contra;
    private int edad;
    private boolean admin;

    public Usuario(String nombre, String contra, int edad, boolean esAdmin) {
        this.nombre = nombre;
        this.contra = contra;
        this.admin=esAdmin;
    }

    
    //Getters & Setters
    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getContra() {
        return contra;
    }

    public void setContra(String contra) {
        this.contra = contra;
    }

    public int getEdad() {
        return edad;
    }

    public void setEdad(int edad) {
        this.edad = edad;
    }

    public boolean isAdmin() {
        return admin;
    }

    public void setAdmin(boolean admin) {
        this.admin = admin;
    }
    
    
    
}
