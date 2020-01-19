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

    /**
     * Constructor para recuperar mensajes
     * @param idMensaje
     * @param autor
     * @param destinatario
     * @param contenido
     * @param claves
     * @param claveBooleana 
     */
    public Mensaje(int idMensaje, String autor, String destinatario, String contenido, String claves, boolean claveBooleana) {
        this.idMensaje = idMensaje;
        this.autor = autor;
        this.destinatario = destinatario;
        this.contenido = contenido;
        this.claveBooleana = claveBooleana;
        
        this.claves=parsearClaves(claves);
        
    } 
    
    /**
     * Constructor para crear mensajes
     * @param autor
     * @param destinatario
     * @param contenido 
     */
    public Mensaje(String autor, String destinatario, String contenido){
        this.autor=autor;
        this.destinatario=destinatario;
        this.contenido=contenido;
        this.claves=generarClaves();
        
        double numero=Math.random();
        
        if (numero<0.5)
            this.claveBooleana=false;
        else
            this.claveBooleana=true;
    }
    
    /**
     * Encriptar mensaje
     * @return
     */
    public void encriptarMensaje() {
        
        StringBuilder sb=new StringBuilder();
        int contadorClaves=0;
        
        //Se recorre el contenido del mensaje
        for(int i=0;i<contenido.length();i++){
  
            //Se almacena el char actual
            char charActual=contenido.charAt(i);
            
            //Si es mayuscula
            if(charActual>='A' && charActual<='Z'){
                
                //Se obtiene el codigo 
                int codigoAscii=charActual-'A'+claves.get(contadorClaves);
                
                //Se hace el modulo de 26 
                codigoAscii=codigoAscii%26;
                
                //Se concatena
                sb.append((char)(codigoAscii+'A'));
                
                //Se aumenta el contador
                contadorClaves++;
            }
            //Si es minuscula
            else if(charActual>='a' && charActual<='z'){
                int codigoAscii=charActual-'a'+claves.get(contadorClaves);
                codigoAscii=codigoAscii%26;
                
                sb.append((char)(codigoAscii+'a'));
                
                contadorClaves++;
            }
            else{
                sb.append(charActual);
            }
            
            //Reiniciar contador
            if (contadorClaves==10)
                contadorClaves=9;
            
        }
        
        contenido=sb.toString();
    }
    
    /**
     * Desencriptar mensaje
     * @return
     */
    public void desencriptarMensaje() {
    
        StringBuilder sb=new StringBuilder();
        int contadorClaves=0;

        //Se recorre el contenido del mensaje
        for(int i=0;i<contenido.length();i++){
            
            //Se almacena el char actual
            char charActual=contenido.charAt(i);
            
            //Si el char es mayuscula
            if(charActual>='A' && charActual<='Z'){
                
                //Se recupera el codigo ascii inicial 
                int codigoAscii=charActual-'A'-claves.get(contadorClaves);
                
                //Si el codigo es menor que 0 se le suma 26
                if(codigoAscii<0)
                    codigoAscii=26+codigoAscii;
                
                //Se concatena al mensaje
                sb.append((char)(codigoAscii+'A'));
                contadorClaves++;
            }
            //Si el char es minuscula
            else if(charActual>='a' && charActual<='z'){
                int codigoAscii=charActual-'a'-claves.get(contadorClaves);
                
                if(codigoAscii<0)
                    codigoAscii=26+codigoAscii;
                
                sb.append((char)(codigoAscii+'a'));
                contadorClaves++;
            }
            else{
                sb.append(charActual);
            }
        
            //Reiniciar contador
            if (contadorClaves==10)
                contadorClaves=9;
            
        }
        
        contenido=sb.toString();
    }
    
    /**
     * Funcion para generar las claves
     * @return 
     */
    private static List<Integer> generarClaves(){
        int numero=0;
        List<Integer> numeros=new ArrayList<Integer>();
        
        do{
            //Se genera un numero aleatorio entre 1 y 26
            numero=(int) Math.round(Math.random()*(26-1)+1);
            
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
    
    /**
     * Formatear claves a String
     * @return 
     */
    public String formatearClaves(){
        StringBuilder clavesFormateadas=new StringBuilder();
        
        for(Integer clave:claves){
            clavesFormateadas.append(clave+",");
        }
        
        return clavesFormateadas.toString();
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
