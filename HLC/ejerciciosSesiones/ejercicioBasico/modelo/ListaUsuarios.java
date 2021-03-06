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
public class ListaUsuarios extends ArrayList<Usuario>{
    
    //Instancia singleton
    private static ListaUsuarios instancia = null;

    //Constructor privado Singleton
    private ListaUsuarios(){}
    
    //Inicializar lista
    private static void init() {
        instancia.add(new Usuario("Admin", "admin", 23, true));
    }
    
    //Funcion para conseguir instancia del singleton
    public static ListaUsuarios getInstancia(){
        if (instancia==null){
            instancia=new ListaUsuarios();
            init();
        }
        
        return instancia;
    }
    
    //Comprobar si las credenciales son correctas
    public Usuario login(String nombre, String pass){
        
        for (Usuario usuario:this){
            if (usuario.getNombre().equals(nombre) && usuario.getContra().equals(pass))
                return usuario;
        }
        
        return null;
    }
    
    //Comprobar si usuario existe 
    public Usuario login(String nombre){
        
        for (Usuario usuario:this){
            if (usuario.getNombre().equals(nombre))
                return usuario;
        }
        
        return null;
    }
}
