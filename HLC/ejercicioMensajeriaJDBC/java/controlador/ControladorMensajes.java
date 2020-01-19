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
