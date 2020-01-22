/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo;

import controlador.Conexion;
import controlador.ControladorMensajes;
import static controlador.ControladorMensajes.getMensajesUsuario;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import javax.swing.JOptionPane;

/**
 *
 * @author danir
 */
public class NewMain {

    public static String caracteresMinus = "abcdefghijklmnopqrstuvwxyz";

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        List<String> spammers=getSpammers();
        
        for (String spammer:spammers){
            System.out.println(spammer+"\n");
        }
    }

 
    /**
     * Obtener lista de posibles spammers
     * @return 
     */
    public static List<String> getSpammers(){
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

}
