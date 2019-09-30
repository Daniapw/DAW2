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
public class Ejercicio2 {
   
    public static int[] ejercicio2(int[] arrayInicial){
        
        int arraySinImpares[]=new int[arrayInicial.length];
        int ultimoPar=0;
        
        for(int i=0; i < arrayInicial.length; i++){
            
            if (arrayInicial[i]%2!=0){
                
                if(i==0)
                    arraySinImpares[i]=0; 
                else
                    arraySinImpares[i]=ultimoPar+2;
            }
            else{
                arraySinImpares[i]=arrayInicial[i];
                ultimoPar=arrayInicial[i];
            }
                
           
        }
        
        return arraySinImpares;
    }
    
}
