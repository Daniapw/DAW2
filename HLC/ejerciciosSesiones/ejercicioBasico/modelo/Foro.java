/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ejercicio1.modelo;

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
            instancia.add(new Mensaje("Dani", "abaababab"));
            instancia.add(new Mensaje("Rafa", "abaababab"));
        }
        
        return instancia;
    }
    
    //Listar mensajes
    @Override
    public String toString(){
        
        StringBuffer str=new StringBuffer();
       
        str.append("<div><h1>Bienvenido al Foro</h1>");
        
        if (!this.isEmpty()){
            for (Mensaje mensaje:this){
                str.append(mensaje.toString());
            }
        }
        else{
            str.append("<p>No hay mensajes en el foro, sé el primero en decir algo!</p>");
        }
        
        str.append("</div>");
        
        return str.toString();
    }
}
