/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servlets.ejercicio2_1;

/**
 *
 * @author danir
 */
public class Noticia {
    private String titular;
    private String contenido;

    public Noticia(String titular, String contenido) {
        this.titular = titular;
        this.contenido = contenido;
    }

    public String getTitular() {
        return titular;
    }

    public void setTitular(String titular) {
        this.titular = titular;
    }

    public String getContenido() {
        return contenido;
    }

    public void setContenido(String contenido) {
        this.contenido = contenido;
    }
    
    
}
