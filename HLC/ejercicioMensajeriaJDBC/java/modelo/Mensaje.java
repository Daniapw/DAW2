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
    
    public Mensaje(String autor, String destinatario, String contenido){
        this.autor=autor;
        this.destinatario=destinatario;
        this.claves=generarClaves();
        
        double numero=Math.random();
        
        if (numero<0.5)
            this.claveBooleana=false;
        else
            this.claveBooleana=true;
    }
    
    /**
     * 
     * @return 
     */
    private String encriptarMensaje(){
        String mensajeEncr="";
        char[] caracteres=contenido.toCharArray();
        int contadorClave=0;
        int codigoAscii=0;
        
        //Se recorren los caracteres del mensaje 1 por 1
        for (int i=0; i < caracteres.length;i++){
            
            //Si el caracter es una letra se codifica
            if (Character.isLetter(caracteres[i])){
                //Primero se obtiene el codigo ascii del caracter
                codigoAscii=(int) caracteres[i];
                
                //Luego se le suma o restael valor actual de claves dependiendo de la clave booleana
                if (claveBooleana)
                    codigoAscii+=claves.get(contadorClave);
                else
                    codigoAscii-=claves.get(contadorClave);
                
                //El caracter encriptado se anade al mensaje
                mensajeEncr=mensajeEncr+Character.toString((char) codigoAscii);
                
                //Se aumenta el contador clave
                contadorClave++;
                
                //Si el contador de claves ha llegado a 9
                if (contadorClave==10)
                    contadorClave=0;
            }
        }
        
        return mensajeEncr;
    }
    
    /**
     * Funcion para generar las claves
     * @return 
     */
    private static List<Integer> generarClaves(){
        int numero=0;
        List<Integer> numeros=new ArrayList<Integer>();
        
        do{
            //Se genera un numero aleatorio entre 1 y 50
            numero=(int) Math.round(Math.random()*(50-1)+1);
            
            //Anadir numeros
            numeros.add(numero);
            
        }while(numeros.size()<10);
        
        return numeros;
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
    
    @Override
    /**
     * toString para mostrar mensajes en pantalla
     */
    public String toString(){
        return 
                "<div class='mensaje'>"
                    + "<div class='autor'>Enviado por: "+this.autor+" || Destinatario: "+this.destinatario+"</div>"
                    + "<div class='cuerpo'>"

                            +"<div class='contenido'>"
                                + this.contenido
                            +"</div>"

                            +"<div class=\"controlesMensaje\">" +
                                "<form action=\"MensajesServlet\" method=\"post\">" +
                                    "<input type=\"hidden\" name=\"idMensaje\" value='"+this.idMensaje+"'>" +
                                    "<input type=\"submit\" name=\"btnEliminarMensaje\" value=\"Eliminar mensaje\">" +
                                "</form>" +
                            "</div>"
                    +"</div>"
                +"</div>";
    }
    
    /**
     * toString para mostrar mensajes en pantalla
     */
    public String toStringEnviados(){
        return 
                "<div class='mensaje'>"
                    + "<div class='autor'>Enviado a: "+this.destinatario+"</div>"
                    + "<div class='cuerpo'>"
                            +"<div class='contenido'>"
                                + this.contenido
                            +"</div>"
                    +"</div>"
                +"</div>";
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
