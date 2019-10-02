/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package repasoObjetos.ejercicio3;
/**
 *
 * @author danir
 */
public class MainPassword {
    
    public static void main(String[] args) {
     
        Password sinLongitud=new Password();
        
        Password conLongitud=new Password(30);
        
        System.out.println(conLongitud.esFuerte());
    }    
}
