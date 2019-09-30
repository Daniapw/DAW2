/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package repaso.repasoArraysAvanzados;

/**
 *
 * @author diurno
 */
public class MainArraysAvanzados {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int array1[] = {3,2,2,5,7} ;
        
        array1=Ejercicio2.ejercicio2(array1);
        
        for(int elem:array1){
            System.out.print(elem + " ");
        }
    }
    
}
