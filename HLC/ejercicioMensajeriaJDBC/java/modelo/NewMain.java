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
        List<Integer> claves=generarClaves();

        String mensaje = "hoLa TiOoOOOOOOóoo.....";
        String mensajeEncr=encriptarMensaje(mensaje, claves);
        
        System.out.println("Mensaje: \n"+mensaje);
        System.out.println("\nMensaje encriptado: "+mensajeEncr);
        System.out.println("\nMensaje desencriptado: "+desencriptarMensaje(mensajeEncr, claves));

    }

    /**
     * Encriptar mensaje
     * @return
     */
    private static String encriptarMensaje(String contenido, List<Integer> claves) {
        
        StringBuilder sb=new StringBuilder();
        int contadorClaves=0;
        
        for(int i=0;i<contenido.length();i++){
            
            char charActual=contenido.charAt(i);
            
            if(charActual>='A' && charActual<='Z'){
                int codigoAscii=charActual-'A'+claves.get(contadorClaves);
                
                codigoAscii=codigoAscii%26;
                
                sb.append((char)(codigoAscii+'A'));
                
                contadorClaves++;
            }
            else if(charActual>='a' && charActual<='z'){
                int codigoAscii=charActual-'a'+claves.get(contadorClaves);
                codigoAscii=codigoAscii%26;
                
                sb.append((char)(codigoAscii+'a'));
                
                contadorClaves++;
            }
            else{
                sb.append(charActual);
            }
            
            //Reiniciar contador
            if (contadorClaves==10)
                contadorClaves=9;
            
        }
        
        return sb.toString();
    }

    /**
     * Desencriptar mensaje
     * @return
     */
    private static String desencriptarMensaje(String contenido, List<Integer> claves) {
    
        StringBuilder sb=new StringBuilder();
        int contadorClaves=0;

        for(int i=0;i<contenido.length();i++){
            
            char charActual=contenido.charAt(i);
            
            if(charActual>='A' && charActual<='Z'){
                int codigoAscii=charActual-'A'-claves.get(contadorClaves);
                
                if(codigoAscii<0)
                    codigoAscii=26+codigoAscii;
                
                sb.append((char)(codigoAscii+'A'));
                contadorClaves++;
            }
            else if(charActual>='a' && charActual<='z'){
                int codigoAscii=charActual-'a'-claves.get(contadorClaves);
                
                if(codigoAscii<0)
                    codigoAscii=26+codigoAscii;
                
                sb.append((char)(codigoAscii+'a'));
                contadorClaves++;
            }
            else{
                sb.append(charActual);
            }
        
            //Reiniciar contador
            if (contadorClaves==10)
                contadorClaves=9;
            
        }
        return sb.toString();
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
            numero = (int) Math.round(Math.random() * (26 - 1) + 1);

            //Anadir numeros
            numeros.add(numero);

        } while (numeros.size() < 10);

        return numeros;
    }

}
