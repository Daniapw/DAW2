/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package modelo;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author diurno
 */
public class Mensaje {
    private int idMensaje;
    private String autor;
    private String destinatario;
    private String contenido;
    private List<Integer> claves=new ArrayList<Integer>();
    private boolean claveBooleana;

    public Mensaje(int idMensaje, String autor, String destinatario, String contenido, String claves, boolean claveBooleana) {
        this.idMensaje = idMensaje;
        this.autor = autor;
        this.destinatario = destinatario;
        this.contenido = contenido;
        this.claveBooleana = claveBooleana;
        
        this.claves=parsearClaves(claves);
        
    } 
    
    /**
     * Parsear numeros del campo claves
     * @param claves
     * @return 
     */
    private static List<Integer> parsearClaves(String claves){
        List<Integer> listaNumeros=new ArrayList<Integer>();
        String[] numeros=claves.split(",");
        
        for (int i=0; i < numeros.length; i++){
            listaNumeros.add(Integer.parseInt(numeros[i]));
        }
        
        return listaNumeros;
    }
    
    
    public int getIdMensaje() {
        return idMensaje;
    }

    public void setIdMensaje(int idMensaje) {
        this.idMensaje = idMensaje;
    }

    public String getAutor() {
        return autor;
    }

    public void setAutor(String autor) {
        this.autor = autor;
    }

    public String getDestinatario() {
        return destinatario;
    }

    public void setDestinatario(String destinatario) {
        this.destinatario = destinatario;
    }

    public String getContenido() {
        return contenido;
    }

    public void setContenido(String contenido) {
        this.contenido = contenido;
    }

    public List<Integer> getClaves() {
        return claves;
    }

    public void setClaves(List<Integer> claves) {
        this.claves = claves;
    }

    public boolean isClaveBooleana() {
        return claveBooleana;
    }

    public void setClaveBooleana(boolean claveBooleana) {
        this.claveBooleana = claveBooleana;
    }
    
    
}
