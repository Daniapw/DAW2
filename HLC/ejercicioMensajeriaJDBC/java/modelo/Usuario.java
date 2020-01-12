/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo;

/**
 *
 * @author danir
 */
public class Usuario {
    private String nombre;
    private String pass;
    private int[] claves=new int[10];
    private boolean claveBooleana;

    public Usuario(String nombre, String pass, boolean claveBooleana) {
        this.nombre = nombre;
        this.pass = pass;
        this.claveBooleana=claveBooleana;
    }
    
    public Usuario(String nombre, String pass) {
        this.nombre = nombre;
        this.pass = pass;
        
        //Generar claves
        this.claves=generarClaves();
        
        //Generar clave booleana
        double numeroAleatorio=Math.random();
        if (numeroAleatorio>0.5)
            this.claveBooleana=true;
        else
            this.claveBooleana=false;
    }

    public static int[] generarClaves(){
        int numero=0;
        
        int[] numeros=new int[10];
        
        for (int i=0; i < 10; i++){
            numero=(int) Math.round(Math.random()*(50-1)+1);
            numeros[i]=numero;
        }
        
        return numeros;
    }
    
    
    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getPass() {
        return pass;
    }

    public void setPass(String pass) {
        this.pass = pass;
    }

    public int[] getClaves() {
        return claves;
    }

    public void setClaves(int[] claves) {
        this.claves = claves;
    }

    public boolean isClaveBooleana() {
        return claveBooleana;
    }

    public void setClaveBooleana(boolean claveBooleana) {
        this.claveBooleana = claveBooleana;
    }
    
    
}
