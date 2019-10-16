/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectopararun.polimorfismo;

import java.util.ArrayList;
import java.util.List;
import javax.swing.JOptionPane;

/**
 *
 * @author danir
 */
public class MainMafiosos {
    public static List<Mafioso> mafiosos=new ArrayList<Mafioso>();

    /**
     * Main
     * @param args 
     */
    public static void main(String[] args) {
        
        mafiosos.add(new Capo("Tony", "El Gordo", "Italoamericanos", 48, "", 4));
        
        Mafioso sicario=new Sicario("Johnny", "Labios Sellados", "Italoamericanos", 30, "", 6);
        
        mafiosos.add(sicario);
        
        mafiosos.get(0).ejecutadoPor((Sicario) sicario);
        
        //Bucle principal
        int opcion=-1;
        do{
            
            try{
                //Mostrar menu
                opcion=Integer.parseInt(JOptionPane.showInputDialog("Elija una opcion: "
                        + "\n0. Salir"
                        + "\n1. Mostrar lista de mafiosos e informacion"
                        + "\n2. Mostrar mafioso en especifico"
                        + "\n3. Anadir mafioso"
                        + "\n4. Quitar mafioso"));
                
                //Ejecutar funcion
                gestionarRespuesta(opcion);
                
            }catch(NumberFormatException e){
                
                //Mensaje de error
                JOptionPane.showMessageDialog(null, "Elija una de las opciones");
            }
            
        }while(opcion!=0);
        
    }
    
    /**
     * Funcion que llamara a una funcion segun la opcion
     * @param opcion 
     */
    public static void gestionarRespuesta(int opcion){
        
        //Si el usuario ha introducido una opcion invalida se muestra un mensaje
        if (opcion<0 || opcion>4){
             JOptionPane.showMessageDialog(null, "Elija una de las opciones");
        }
        //Si ha introducido una opcion valida se llama a una funcion
        else{
            
            switch (opcion){
                case 1:{
                    
                    if (mafiosos.isEmpty())
                        JOptionPane.showMessageDialog(null, "La lista de mafiosos esta vacia");
                    else
                        mostrarLista();
                    
                    break;
                }
                case 2:{
                    
                    break;
                }
            }
        }
    }
    
    /**
     * Funcion para mostrar lista de mafiosos
     * @param mafiosos 
     */
    public static void mostrarLista(){
        
        System.out.println("//////////////////LISTA MAFIOSOS//////////////////");
        
        for(Mafioso mafioso:mafiosos){
            System.out.println("\n------------Mafioso " + (mafiosos.indexOf(mafioso) + 1) + "------------");
            System.out.println(mafioso.toString());
        }
    }
    
    public static void mostrarMafiosoEspecifico(){
        
        System.out.println("");
        
    }
    
}
