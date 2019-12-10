/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package modelo;

import java.util.ArrayList;

/**
 *
 * @author diurno
 */
public class ListaUsuarios extends ArrayList<Usuario> {
    
    public ListaUsuarios(){
        this.add(new Usuario("Dani", "dani", "usuario"));
    }
    
    
    //Comprobar si las credenciales son correctas
    public Usuario login(String nombre, String pass){
        
        for (Usuario usuario:this){
            if (usuario.getUsuario().equals(nombre) && usuario.getContra().equals(pass))
                return usuario;
        }
        
        return null;
    }
}
