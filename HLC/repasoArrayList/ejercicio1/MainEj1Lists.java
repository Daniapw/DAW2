/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package repasoArrayList.ejercicio1;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import javax.swing.JOptionPane;

/**
 *
 * @author diurno
 */
public class MainEj1Lists {
    
    
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        List<Integer> listaNumeros= leerValores();
        
        int suma=sumarValores(listaNumeros);
        
        int media=suma/listaNumeros.size();
        
        mostrarResultados(listaNumeros, suma, media);
        
    }
    
    //Metodo para leer valores
    public static List<Integer> leerValores(){
        List<Integer> listaNumeros=new ArrayList<Integer>();
        
        int numero=0;
        
        do{
            
            try{
                numero=Integer.parseInt(JOptionPane.showInputDialog("Introduce un numero (-99 para salir)"));

                if (numero!=-99){
                    listaNumeros.add(numero);
                }
            }catch(NumberFormatException e){
                JOptionPane.showMessageDialog(null, "Introduzca solo numeros enteros");
            }
            
        }while(numero!=-99);
        
        return listaNumeros;
    }
    
    //Metodo para calcular suma
    public static int sumarValores(List<Integer> lista){
        int suma=0;
        
        Iterator<Integer> iterator = lista.iterator();
        
        while(iterator.hasNext()){
            suma+=iterator.next();
        }
        
        return suma;
    }
    
    //Metodo para mostrar informacion
    public static void mostrarResultados(List<Integer> lista, int suma, int media){
        
        int contadorMayorMedia=0;
        
        //Imprimir numeros y contar superiores a la media
        System.out.println("Numeros:");
        
        for(Integer numero:lista){
            System.out.print(numero+" ");
            
            if (numero>media){
                contadorMayorMedia++;
            }
        }
        
        //Imprimir resto de la informacion
        System.out.println("\nCantidad de valores leidos: " + lista.size() +
                "\nSuma: " + suma +
                "\nMedia: " + media +
                "\nCantidad de numeros superiores a la media: " + contadorMayorMedia);
        
    }
}
