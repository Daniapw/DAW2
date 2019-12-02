/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ejercicioBasico.modelo;

import java.util.ArrayList;

/**
 *
 * @author diurno
 */
public class Foro extends ArrayList<Mensaje>{
    
    //Instancia singleton
    private static Foro instancia = null;


    //Constructor privado singleton
    private Foro(){}
    
    //Funcion para conseguir instancia del singleton
    public static Foro getInstancia(){
        if (instancia==null){
            instancia=new Foro();
        }
        
        return instancia;
    }
    
    //Coger siguiente id del mensaje
    public int getSiguientetId(){
        int id=0;
        
        if (!this.isEmpty()){
            id=this.get(this.size()-1).getId();
            id++;
        }
        
        return id;
    }
    
    //Borrar mensaje
    public void borrarMensaje(int id){
        int indice=-1;
        
        for (Mensaje mensaje:this){
            if (mensaje.getId()==id){
                indice=this.indexOf(mensaje);
                break;
            }
        }
        
        this.remove(indice);
    }
    
    
    //Listar mensajes
    public String listarMensajes(boolean esAdmin){
        
        StringBuffer str=new StringBuffer();
       
        str.append("<div><h1>Bienvenido al Foro</h1>");
        
        if (!this.isEmpty()){
            
            if (esAdmin){
                for (Mensaje mensaje:this){
                    str.append(mensaje.toStringAdmin());
                }
            }
            else{
                for (Mensaje mensaje:this){
                    str.append(mensaje.toString());
                }
            }
        }
        else{
            str.append("<p>No hay mensajes en el foro, sé el primero en decir algo!</p>");
        }
        
        str.append("</div>");
        
        return str.toString();
    }
}
