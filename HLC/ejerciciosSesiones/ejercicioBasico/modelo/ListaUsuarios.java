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
public class ListaUsuarios extends ArrayList<Usuario>{
    
    //Instancia singleton
    private static ListaUsuarios instancia = null;

    //Constructor privado Singleton
    private ListaUsuarios(){}
    
    //Inicializar lista
    private static void init() {
        Usuario dani=new Usuario("Dani", "dani", 23);
        Usuario rafa=new Usuario("Rafa", "rafa", 26);
        
        instancia.add(dani);
        instancia.add(rafa);
    }
    
    //Funcion para conseguir instancia del singleton
    public static ListaUsuarios getInstancia(){
        if (instancia==null){
            instancia=new ListaUsuarios();
            init();
        }
        
        return instancia;
    }
    
    //Comprobar si usuario existe
    public Usuario login(String nombre, String pass){
        
        for (Usuario usuario:this){
            if (usuario.getNombre().equals(nombre) && usuario.getContra().equals(pass))
                return usuario;
        }
        
        return null;
    }
}
