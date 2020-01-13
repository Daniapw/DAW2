
package controlador;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import modelo.Usuario;

/**
 *
 * @author danir
 */
public class ControladorUsuario {
    
    /**
     * 
     * @return
     * @throws SQLException 
     */
    public static List<Usuario> getAllUsuarios() throws SQLException{
        List<Usuario> usuarios=new ArrayList<Usuario>();
        
        Connection conexion = Conexion.getConex();
                
        Statement instruccion = conexion.createStatement();
        
        String sql = "SELECT * from usuarios";
        ResultSet resultados = instruccion.executeQuery(sql);

                
        while(resultados.next()){
            usuarios.add(new Usuario(resultados.getString(1), resultados.getString(2), resultados.getString(3), resultados.getBoolean(4)));
        }
        
        conexion.close();
        instruccion.close();
        resultados.close();
        
        return usuarios;
    }
    
    
    /**
     * Login
     * @param nombreUsuario
     * @param pass
     * @return 
     */
    public static boolean login(String nombreUsuario, String pass){
        Connection conex=Conexion.getConex();
        
        boolean existe=false;
        
        try {
            PreparedStatement ps=conex.prepareStatement("SELECT * FROM usuarios WHERE nombre=? AND pass=?");
            
            ps.setString(1, nombreUsuario);
            ps.setString(2, pass);
            
            ResultSet resultados=ps.executeQuery();
            
            
            if (resultados.next()!=false)
                existe=true;
            
            conex.close();
            ps.close();
            resultados.close();
            
        } catch (SQLException ex) {
            ex.printStackTrace();
        }

        return existe;
    }
    
    /**
     * Obtener usuario 
     * @param nombreUsuario
     * @return 
     */
    public static Usuario getUsuario(String nombreUsuario){
        Connection conex=Conexion.getConex();
        
        Usuario usuario=null;
        
        try {
            PreparedStatement ps=conex.prepareStatement("SELECT * FROM usuarios WHERE nombre=?");
            
            ps.setString(1, nombreUsuario);
            
            ResultSet resultados=ps.executeQuery();
            
            if (resultados.next())
                usuario=new Usuario(resultados.getString(1), resultados.getString(2), resultados.getString(3), resultados.getBoolean(4));
            
            conex.close();
            ps.close();
            resultados.close();
            
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
        
        
        return usuario;
    }

    /**
     * Insert usuario
     * @param usuario 
     */
    public static void insertUsuario(Usuario usuario){
        
        Connection conex=Conexion.getConex();
                
        try {
            PreparedStatement ps=conex.prepareStatement("INSERT INTO usuarios VALUES(?,?,?,?);");
            
            ps.setString(1, usuario.getNombre());
            ps.setString(2, usuario.getPass());
            ps.setString(3, usuario.getTipo());
            ps.setBoolean(4, usuario.isBloqueado());

            
            ps.execute();
            
            conex.close();
            ps.close();
            
        } catch (SQLException ex) {
            ex.printStackTrace();
        }        
    }
}
