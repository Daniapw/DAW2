
package controlador;

import java.sql.*;

/**
 *
 * @author danir
 */
public class Conexion {
    private static final String URL="jdbc:mysql://localhost:3306/ejerciciomensajeria";;
    private static String usuario="dwes";
    private static String pass="abc123.";
    private static Connection conex;
    
    /**
     * Obtener conexion
     * 
     * @return 
     */
    public static Connection getConex() {
        
        try {
            Class.forName("com.mysql.jdbc.Driver");
            
            try {
                conex = DriverManager.getConnection(URL, usuario, pass);
            } catch (SQLException ex) {
                // log an exception. fro example:
                System.out.println(ex.getCause());
                System.out.println("No se ha podido conectar a la base de datos."); 
            }
        } catch (ClassNotFoundException ex) {
            // log an exception. for example:
            System.out.println("Driver no encontrado."); 
        }
        
        return conex;
    }

    public static String getUsuario() {
        return usuario;
    }

    public static void setUsuario(String usuario) {
        Conexion.usuario = usuario;
    }

    public static String getPass() {
        return pass;
    }

    public static void setPass(String pass) {
        Conexion.pass = pass;
    }
    
    
    
}
