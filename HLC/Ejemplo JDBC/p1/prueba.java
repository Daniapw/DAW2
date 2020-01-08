/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package p1;
import java.sql.*;
/**
 *
 * @author diurno
 */
public class prueba {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ///Cadena de conexion de MySql, el parametro useSSL es opcional
        String url = "jdbc:mysql://localhost:3306/pruebas";
        // Cargamos el driver de mysql
        try {
            Class.forName("com.mysql.jdbc.Driver");
            // Creamos el objeto conexion
            Connection conexion = (Connection) DriverManager.getConnection(url, "root", "root");
            // Creamos un objeto Statement
            Statement instruccion = conexion.createStatement();
            // Creamos el query
            String sql = "select DNI, nombre, apellidos from personas";
            ResultSet result = instruccion.executeQuery(sql);
            
            while (result.next()) {
                System.out.print("DNI:" + result.getString(1));
                System.out.print(" Nombre:" + result.getString(2));
                System.out.println(" Apellido:" + result.getString(3));
            }
            
            // Cerrar cada uno de los objetos utilizados
            result.close();
            instruccion.close();
            conexion.close();
            
        } catch (ClassNotFoundException | SQLException e) {
            e.printStackTrace();
        }
    }
    
}
