/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package servlets.ejercicio2_1;

import java.util.ArrayList;

/**
 *
 * @author diurno
 */
public class ListaNoticias extends ArrayList<Noticia> {
    
    public ListaNoticias(){
        for (int i=0; i < 6; i++){
            this.add(new Noticia("Noticia "+(i+1), "Contenido noticia " + (i+1)));
        }
    }
}
