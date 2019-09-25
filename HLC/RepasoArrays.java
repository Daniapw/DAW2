/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package repaso;

import javax.swing.JOptionPane;

/**
 *
 * @author diurno
 */
public class RepasoArrays {
    
    public static void main(String[] args) {
        ejercicio14();
    }
    
    //Ejercicio 10
    public static int[] ejercicio10(){
        int array1[]=new int[20];
        int array2[]=new int[20];
        int arrayFinal[]=new int[array1.length+array2.length];
        
        
        for (int i=0;i<array1.length;i++){
            array1[i]=(int)(Math.random()*100);
            array2[i]=(int)(Math.random()*100);
        }
        
        
        for (int i=0; i < array1.length; i++){
            arrayFinal[i]=array1[i];
        }
        
        for (int i=0; i < array2.length; i++){
            arrayFinal[i+array2.length]=array2[i];
        }
        
        return arrayFinal;
    }
    
    //Ejercicio 11
    public static void ejercicio11(){
        //Aquí uso el método del ejercicio anterior para obtener el array combinado
        int array[] = ejercicio10();
        
        System.out.println("Array:");
        for (int i=0; i < array.length; i++){
            System.out.print(array[i] + " ");
        }
        
        
        
        //Ordenar array
        int aux;
        for (int i=0; i < array.length; i++){
            for (int j=0; j < array.length-1; j++){
                
                if (array[j]>array[j+1]){
                    aux=array[j+1];
                    array[j+1]=array[j];
                    array[j]=aux;
                }  
                
            }
        }
        
        System.out.println("\nArray ordenado:");
        for (int i=0; i < array.length; i++){
            System.out.print(array[i] + " ");
        }
    }
    
    //Ejercicio 12
    public static void ejercicio12(){
       
        int numeroPersonas;
       
        //Pedir numero de personas que se van a introducir
        do{
            numeroPersonas=Integer.parseInt(JOptionPane.showInputDialog(null, "Introduzca el número de personas (de 1 a 10, 0 para salir)"));
            
            //Si el número introducido se termina el método
            if (numeroPersonas==0)
                return;
            
            //Si el número es menor de 1 o mayor de 10 sale un mensaje de advertencia
            if (numeroPersonas<1 || numeroPersonas>10)
                JOptionPane.showMessageDialog(null, "Ha introducido un número de personas inválido, vuelva a intentarlo");
            
        }while(numeroPersonas<1 || numeroPersonas>10);
        
        
        //Pedir alturas de las personas
        int alturas[]=new int[numeroPersonas];
        int media=0;
        
        for(int i=0; i < alturas.length; i++){
            
            try{
                
                do{
                    alturas[i]=Integer.parseInt(JOptionPane.showInputDialog("Introduzca la altura de la persona " + (i+1) + " en cm (0 para salir)"));
                    
                    //Si el número introducido se termina el método
                    if (alturas[i]==0)
                        System.exit(0);
                    
                    //Si el número es menor de 0 aparecerá un mensaje de advertencia
                    if (alturas[i]<0)
                        JOptionPane.showMessageDialog(null, "Solo se permiten números enteros positivos");
                    //Si es válido se sumará a la variable media
                    else
                        media+=alturas[i];
                    
                }while(alturas[i]<1);
                
            }catch(NumberFormatException e){
                JOptionPane.showMessageDialog(null, "Solo se permiten números enteros positivos");
                i--;
            }
            
        }
        
        //Calcular media y clasificar alturas+
        media=media/numeroPersonas;
        System.out.println("Media: " + media);
        
        int mayorALaMedia=0;
        int menorALaMedia=0;
        
        for(int i=0; i < alturas.length; i++){
            if(alturas[i]<media){
                menorALaMedia++;
            }
            else{
                if(alturas[i]>media)
                    mayorALaMedia++;
            }
        }
        
        //Resultado
        JOptionPane.showMessageDialog(null, "Media: " + media +
                "\nPersonas más bajas que la media: " + menorALaMedia +
                "\nPersonas más altas que la media: " + mayorALaMedia);
    }
    
    //Ejercicio 13
    public static void ejercicio13(){
        int numeros[]=new int[10];
        int posiciones[]=new int[10];
        int contador=0;
        
        //Pedir números
        for(int i=0; i<numeros.length;i++){
            
            try{
                numeros[i]=Integer.parseInt(JOptionPane.showInputDialog("Introduzca un número entero " + (i+1) + " de 10"));
                
                if (numeros[i]%10==4){
                    posiciones[contador]=i;
                    contador++;
                }
                
            }catch(NumberFormatException e){
                JOptionPane.showMessageDialog(null, "Solo números enteros");
                i--;
            }
        }
        
        //Imprimir posiciones
        System.out.println("Posiciones: ");
        for (int i=0; i < contador; i++){   
            System.out.print(posiciones[i] + " ");
        }
        
    
    }
    
    //Ejercicio 14
    public static void ejercicio14(){
        
        for (int i=100; i < 300; i++){
            
            if (isPrimo(i))
                System.out.print(i + " ");
            
        }
        
    }
    
    
    
    
    //Método para calcular números primos
    public static boolean isPrimo(int numero){
        
        for (int i=2; i < numero; i++){
            if(numero%i==0){
                return false;
            }
            else {
                if ((numero/i)<=i)
                    return true;
            }
        }
        
        return true;
    }
}
