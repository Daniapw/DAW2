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
public class Ejercicio1 {
    
    public static String ejercicio1(int[] array1, int[] array2){
        
        int arraySuma[] = new int[array1.length];
        
        //Sumar arrays
        for (int i=0; i < array1.length; i++){
            arraySuma[i]=(array1[i] + array2[i]) - 4;
        }
        
        //Convertir a ascii
        StringBuffer mensaje=new StringBuffer();
        char letra;
        
        for (int elem:arraySuma){
            letra=(char) elem;
            mensaje.append(letra);
        }
        
        return mensaje.toString();
    }
}
