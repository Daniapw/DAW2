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

    public static String caracteresMinus = "abcdefghijklmnopqrstuvwxyz";

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {

        //Se genera un numero aleatorio entre 1 y 50
        int numero = (int) Math.round(Math.random() * (50 - 1) + 1);
        System.out.println(numero);
        String mensaje = "hola, tio";
        String mensajeEncr=encriptarMensaje(mensaje, numero);
        
         System.out.println("Mensaje: \n"+mensaje);
         System.out.println("\nMensaje encriptado: "+mensajeEncr);
         System.out.println("\nMensaje desencriptado "+desencriptarMensaje(mensajeEncr, numero));
    }

    /**
     *
     * @return
     */
    private static String encriptarMensaje(String contenido, int clave) {
        String caracterActualEnString;
        char caracterActualEnChar;
        String mensajeEncr = "";

        //Se recorre el texto
        for (int i = 0; i < contenido.length(); i++) {
            
            //Se guarda el caracter en formato String y en formato char
            caracterActualEnString = contenido.substring(i, i+1);
            caracterActualEnChar = caracterActualEnString.charAt(0);
            
            //Si el caracter es una letra
            if (Character.isLetter(caracterActualEnChar)) {
                int posicionEnArray = caracteresMinus.indexOf(caracterActualEnChar);
                int posicionFinal=(posicionEnArray + clave) % caracteresMinus.length();

                caracterActualEnString = caracteresMinus.substring(posicionFinal, posicionFinal+1);

            }

            mensajeEncr = mensajeEncr + caracterActualEnString;
        }

        return mensajeEncr;
    }

    /**
     *
     * @return
     */
    private static String desencriptarMensaje(String contenido, int clave) {
        String caracterActualEnString;
        char caracterActualEnChar;
        String mensajeEncr = "";

        //Se recorre el texto
        for (int i = 0; i < contenido.length(); i++) {
            
            //Se guarda el caracter en formato String y en formato char
            caracterActualEnString = contenido.substring(i, i+1);
            caracterActualEnChar = caracterActualEnString.charAt(0);
            
            //Si el caracter es una letra
            if (Character.isLetter(caracterActualEnChar)) {
                int posicionEnArray = caracteresMinus.indexOf(caracterActualEnChar);
                int posicionFinal=(posicionEnArray - clave) % caracteresMinus.length();

                caracterActualEnString = caracteresMinus.substring(posicionFinal, posicionFinal+1);

            }

            mensajeEncr = mensajeEncr + caracterActualEnString;
        }

        return mensajeEncr;
    }

    /**
     * Funcion para generar las claves
     *
     * @return
     */
    private static List<Integer> generarClaves() {
        int numero = 0;
        List<Integer> numeros = new ArrayList<Integer>();

        do {
            //Se genera un numero aleatorio entre 1 y 50
            numero = (int) Math.round(Math.random() * (50 - 1) + 1);

            //Anadir numeros
            numeros.add(numero);

        } while (numeros.size() < 10);

        return numeros;
    }

}
