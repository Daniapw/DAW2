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
public class Mensaje {
    private String autor;
    private String mensaje;
    private int id;

    public Mensaje(String autor, String mensaje, int id) {
        this.autor = autor;
        this.mensaje = mensaje;
        this.id=id;
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

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }
    
    
    
    @Override
    //toString para mostrar mensajes en formato usuario normal
    public String toString(){
        return 
        "<div class='cajaMensaje'>"
            + "<div class='autor'><p>Usuario "+this.autor +" dijo:</p></div>"
            + "<p class='mensaje'>"+this.mensaje+"</p>"
        + "</div>";
    }
    
    //toString para mostrar mensaje con boton para eliminar mensaje
    public String toStringAdmin(){
        return 
        "<div class='cajaMensaje'>"
            + "<div class='autor'><p>Usuario "+this.autor +" dijo:</p></div>"
            + "<p class='mensaje'>"+this.mensaje+"</p>"
            + "<div class='formAdmin'>"
                + "<form action='ForoServlet' method='post'>"
                +   "<input type='hidden' name='idMensaje' value='"+this.id+"'>"
                +   "<input type='submit' name='eliminar' value='Eliminar mensaje'>"
                + "</form>"
            + "</div>"
        + "</div>";
    }
}
