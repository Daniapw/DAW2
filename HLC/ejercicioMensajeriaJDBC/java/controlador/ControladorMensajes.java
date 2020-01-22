/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controlador;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import modelo.Mensaje;

/**
 *
 * @author danir
 */
public class ControladorMensajes {
    
    /**
     * Obtener todos los mensajes
     * @return 
     */
    public static List<Mensaje> getAllMensajes(){
        Connection conex=Conexion.getConex();
        List<Mensaje> mensajes=new ArrayList<Mensaje>();
        
        try {
            PreparedStatement ps=conex.prepareStatement("SELECT * FROM mensajes;");
                        
            ResultSet resultados=ps.executeQuery();
            
            while(resultados.next()){
                mensajes.add(new Mensaje(resultados.getInt(1), resultados.getString(2), resultados.getString(3), resultados.getString(4), resultados.getString(5), resultados.getBoolean(6)));
            }
            
            conex.close();
            ps.close();
            resultados.close();
            
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
        
        return mensajes;

    }
    
    /**
     * Obtener mensajes recibidos por un usuario
     * @param nombreUsuario
     * @return 
     */
    public static List<Mensaje> getMensajesUsuario(String nombreUsuario){
        Connection conex=Conexion.getConex();
        List<Mensaje> mensajes=new ArrayList<Mensaje>();
        
        try {
            PreparedStatement ps=conex.prepareStatement("SELECT * FROM mensajes WHERE destinatario=?;");
            
            ps.setString(1, nombreUsuario);
            
            ResultSet resultados=ps.executeQuery();
            
            while(resultados.next()){
                mensajes.add(new Mensaje(resultados.getInt(1), resultados.getString(2), resultados.getString(3), resultados.getString(4), resultados.getString(5), resultados.getBoolean(6)));
            }
            
            conex.close();
            ps.close();
            resultados.close();
            
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
        
        return mensajes;
    }
    
    /**
     * Obtener mensajes enviados por un usuario
     * @param nombreUsuario
     * @return 
     */
    public static List<Mensaje> getMensajesEnviados(String nombreUsuario){
        Connection conex=Conexion.getConex();
        List<Mensaje> mensajes=new ArrayList<Mensaje>();
        
        try {
            PreparedStatement ps=conex.prepareStatement("SELECT * FROM mensajes WHERE autor=?;");
            
            ps.setString(1, nombreUsuario);
            
            ResultSet resultados=ps.executeQuery();
            
            while(resultados.next()){
                mensajes.add(new Mensaje(resultados.getInt(1), resultados.getString(2), resultados.getString(3), resultados.getString(4), resultados.getString(5), resultados.getBoolean(6)));
            }
            
            conex.close();
            ps.close();
            resultados.close();
            
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
        
        return mensajes;      
    }
    
    
    
    /**
     * Insertar mensaje en bd
     * @param mensaje 
     */
    public static void insertMensaje(Mensaje mensaje){
        Connection conex=Conexion.getConex();
        
        //Encriptar mensaje
        mensaje.encriptarMensaje();  
        
        try {
            PreparedStatement ps=conex.prepareStatement("INSERT INTO mensajes (autor, destinatario, contenido, claves, claveBooleana) VALUES(?,?,?,?,?);");
            
            ps.setString(1, mensaje.getAutor());
            ps.setString(2, mensaje.getDestinatario());
            ps.setString(3, mensaje.getContenido());
            ps.setString(4, mensaje.formatearClaves());
            ps.setBoolean(5, mensaje.isClaveBooleana());
            
            ps.execute();
            
            conex.close();
            ps.close();
            
        } catch (SQLException ex) {
            ex.printStackTrace();
        }  
    }
    
    /**
     * Obtener lista de posibles spammers
     * @return 
     */
    public static List<String> getPosiblesSpammers(){
        Connection conex=Conexion.getConex();
        
        //Lista en la que se guardaran los posibles spammers
        List<String> spammers=new ArrayList<String>();
        List<Mensaje> mensajesUsuarios=new ArrayList<Mensaje>();        
        
        try {
            
            //Obtener nombres de los usuarios que hayan enviado 3 o mas mensajes y no hayan sido bloqueados
            PreparedStatement ps=conex.prepareStatement("SELECT autor, count(autor) as cnt FROM mensajes m, usuarios u WHERE u.nombre=m.autor AND u.bloqueado=0 GROUP BY autor HAVING cnt>=3");

            ResultSet posiblesSpammers=ps.executeQuery();

            //Obtener mensajes de cada posible spammer y comprobar si de verdad estan spammeando
            while(posiblesSpammers.next()){
                //Obtener mensajes
                mensajesUsuarios=ControladorMensajes.getMensajesEnviados(posiblesSpammers.getString(1));
                int contadorSpam=1;
                
                //Desencriptar mensajes
                for (Mensaje mensaje:mensajesUsuarios){
                    mensaje.desencriptarMensaje();
                }
                
                //Recorrerlos y determinar si es un spammer
                for(int i =0; i < mensajesUsuarios.size()-1; i++){
                    //Mensaje actual desencriptado
                    Mensaje mensajeActual=mensajesUsuarios.get(i);

                    //Comparar con otros mensajes
                    for (int j=0; j < mensajesUsuarios.size()-1;j++){
                        Mensaje mensajeComparar=mensajesUsuarios.get(j);

                        //Si el mensaje tiene el mismo contenido pero diferente autor se anade 1 al contador de spam
                        if (mensajeActual.getContenido().equals(mensajeComparar.getContenido()) && !mensajeActual.getDestinatario().equals(mensajeComparar.getDestinatario()))
                            contadorSpam++;
                        
                    }

                    //Si el contador de spam ha llegado a 3 se anade a la lista de spammers
                    if (contadorSpam>=3)
                        spammers.add(posiblesSpammers.getString(1));
                }
            }
            
            conex.close();
            ps.close();
            posiblesSpammers.close();
            
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
        
        return spammers;
        
        
    }
    
    /**
     * Borrar mensaje usando ID
     * @param idMensaje 
     */
    public static void deleteMensaje(int idMensaje){
        Connection conex=Conexion.getConex();
        
        try{
            PreparedStatement ps=conex.prepareStatement("DELETE FROM mensajes WHERE idMensaje=?;");
            
            ps.setInt(1, idMensaje);
            
            ps.executeUpdate();
            
            conex.close();
            ps.close();
        } catch (SQLException ex) {
            ex.printStackTrace();
        }

    }
}
