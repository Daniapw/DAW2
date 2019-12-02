/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ejercicio1.modelo;

/**
 *
 * @author diurno
 */
public class Mensaje {
    private String autor;
    private String mensaje;

    public Mensaje(String autor, String mensaje) {
        this.autor = autor;
        this.mensaje = mensaje;
    }

    public String getAutor() {
        return autor;
    }

    public void setAutor(String autor) {
        this.autor = autor;
    }

    public String getMensaje() {
        return mensaje;
    }

    public void setMensaje(String mensaje) {
        this.mensaje = mensaje;
    }
    
    @Override
    public String toString(){
        return 
        "<div class='cajaMensaje'>"
            + "<div class='autor'><p>Usuario "+this.autor +" dijo:</p></div>"
            + "<p class='mensaje'>"+this.mensaje+"</p>"
        + "</div>";
    }
}
