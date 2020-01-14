/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author danir
 */
public class NewMain {
    public static String caracteresMinus="abcdefghijklmnopqrstuvwxyz";

    
    
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        List<Integer> claves=generarClaves();
        
        for(Integer i:claves){
            System.out.println(i.toString());
        }
        
        String mensaje="hola amigo";
        String mensajeEncr=encriptarMensaje(mensaje, true, claves);
        
        System.out.println("Mensaje: \n"+mensaje);
        System.out.println("\nMensaje encriptado: "+mensajeEncr);
        System.out.println("\nMensaje desencriptado: "+desencriptarMensaje(mensajeEncr, true, claves));


    }
    /**
     * 
     * @return 
     */
    private static String encriptarMensaje(String contenido, boolean claveBooleana, List<Integer> claves){
        int contadorClaves=0;
        String caracterActualEnString;
        char caracterActualEnChar;
        String mensajeEncr="";
        
        for (int i=0; i < contenido.length(); i++){
            caracterActualEnString= contenido.substring(i, 1);
            caracterActualEnChar=caracterActualEnString.charAt(0);
            
            if (Character.isLetter(caracterActualEnChar)){
                int posicionEnArray=caracteresMinus.indexOf(caracterActualEnChar);
                
                
                mensajeEncr=mensajeEncr+caracteresMinus.substring(posicionEnArray+claves.get(contadorClaves),1);
                
                contadorClaves++;
                
                if (contadorClaves==10)
                    contadorClaves=0;
            }
        }
        
        return mensajeEncr;
    }
    
        /**
     * 
     * @return 
     */
    private static String desencriptarMensaje(String contenido, boolean claveBooleana, List<Integer> claves){
        int contadorClaves=0;
        String caracterActualEnString;
        char caracterActualEnChar;
        String mensajeEncr="";
        
        for (int i=0; i < contenido.length(); i++){
            caracterActualEnString= contenido.substring(i, 1);
            caracterActualEnChar=caracterActualEnString.charAt(0);
            
            if (Character.isLetter(caracterActualEnChar)){
                int posicionEnArray=caracteresMinus.indexOf(caracterActualEnChar);
                
                mensajeEncr=mensajeEncr+caracteresMinus.substring(posicionEnArray+contadorClaves,1);
            }
        }
        
        return mensajeEncr;
    }
    
    /**
     * Funcion para generar las claves
     * @return 
     */
    private static List<Integer> generarClaves(){
        int numero=0;
        List<Integer> numeros=new ArrayList<Integer>();
        
        do{
            //Se genera un numero aleatorio entre 1 y 50
            numero=(int) Math.round(Math.random()*(50-1)+1);
            
            //Anadir numeros
            numeros.add(numero);
            
        }while(numeros.size()<10);
        
        return numeros;
    }
    
    
}
