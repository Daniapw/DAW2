/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package proyectopararun.arrayAvanzado;

/**
 *
 * @author diurno
 */
public class Ejercicio2 {
   
    public static int[] ejercicio2(int[] arrayInicial){
        
        int arraySinImpares[]=new int[arrayInicial.length];
        int ultimoPar=0;
        
        for(int i=0; i < arrayInicial.length; i++){
            
            //Si el numero es impar
            if (arrayInicial[i]%2!=0){
                
                //Si hay un numero impar en la primera posicion se cambia por 0
                if(i==0){
                    arraySinImpares[i]=0;
                }
                /*Si no esta en la primera posicion se guarda el siguiente numero
                par en arraySinImpares y se guarda en ultimoPar*/
                else{
                    arraySinImpares[i]=ultimoPar+2;
                    ultimoPar=arraySinImpares[i];
                }
            }
            /*Si el numero es par se guarda directamente en arraySinImpares y
            en ultimoPar*/
            else{
                arraySinImpares[i]=arrayInicial[i];
                ultimoPar=arrayInicial[i];
            }
            
        }
        
        return arraySinImpares;
    }
    
}
