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

    public ListaUsuarios() {
        Usuario dani=new Usuario("Dani", "dani", 23);
        Usuario rafa=new Usuario("Rafa", "rafa", 26);
        
        this.add(dani);
        this.add(rafa);
    }
    

    //Comprobar si usuario existe
    public Usuario buscarUsuario(String nombre, String pass){
        
        for (Usuario usuario:this){
            if (usuario.getNombre().equals(nombre) && usuario.getContra().equals(pass))
                return usuario;
        }
        
        return null;
    }
}
