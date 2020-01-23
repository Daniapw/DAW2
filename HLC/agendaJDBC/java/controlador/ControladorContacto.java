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
import javax.swing.JOptionPane;
import modelo.Contacto;

/**
 *
 * @author danir
 */
public class ControladorContacto {
    
    
    /**
     * Obtener todos los mensajes
     * @return 
     */
    public static List<Contacto> getAllContactos(){
        Connection conex=Conexion.getConex();
        List<Contacto> contactos=new ArrayList<Contacto>();
        
        try {
            PreparedStatement ps=conex.prepareStatement("SELECT * FROM contacto ORDER BY nombre;");
                        
            ResultSet resultados=ps.executeQuery();
            
            while(resultados.next()){
                contactos.add(new Contacto(resultados.getString(1), resultados.getString(2), resultados.getString(3), resultados.getString(4)));
            }
            
            conex.close();
            ps.close();
            resultados.close();
            
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
        
        return contactos;
    }
    
    /**
     * Actualizar contacto
     * @param contacto 
     * @param telefonoAntiguo 
     * @return  
     */
    public static boolean updateContacto(Contacto contacto, String telefonoAntiguo){
        Connection conex=Conexion.getConex();
        telefonoAntiguo=telefonoAntiguo.trim();
        
        try {
            PreparedStatement ps=conex.prepareStatement("UPDATE contacto SET nombre=?, telefono=?, direccion=?, email=? WHERE telefono=?");

            ps.setString(1, contacto.getNombre());
            ps.setString(2, contacto.getTelefono());
            ps.setString(3, contacto.getDireccion());
            ps.setString(4, contacto.getEmail());
            ps.setString(5, telefonoAntiguo);

            
            ps.executeUpdate();
            
            conex.close();
            ps.close();
            
        } catch (SQLException ex) {
            return false;
        }  
        
        return true;
    }
    
    /**
     * Insertar contacto
     * @param contacto 
     * @return  
     */
    public static boolean insertContacto(Contacto contacto){
        Connection conex=Conexion.getConex();
        
        try {
            PreparedStatement ps=conex.prepareStatement("INSERT INTO contacto VALUES(?, ?, ?, ?)");

            ps.setString(1, contacto.getNombre());
            ps.setString(2, contacto.getTelefono());
            ps.setString(3, contacto.getDireccion());
            ps.setString(4, contacto.getEmail());

            
            ps.executeUpdate();
            
            conex.close();
            ps.close();
            
        } catch (SQLException ex) {
            return false;
        }  
        
        return true;
    }
    
    /**
     * Eliminar contacto
     * @param telefono 
     * @return  
     */
    public static boolean eliminarContacto(String telefono){
        Connection conex=Conexion.getConex();
        
        telefono=telefono.trim();
        
        try {
            PreparedStatement ps=conex.prepareStatement("DELETE FROM contacto WHERE telefono=?");

            ps.setString(1, telefono);
            
            ps.executeUpdate();
            
            conex.close();
            ps.close();
            
        } catch (SQLException ex) {
            return false;
        }    
        
        return true;
    }
}
