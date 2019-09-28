/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package proyectopararun;

import javax.swing.JOptionPane;

/**
 *
 * @author diurno
 */
public class RepasoArrays {
    
    public static void main(String[] args) {
        ejercicio20();
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
        
        System.arraycopy(array1, 0, arrayFinal, 0, array1.length);
        
        
        System.arraycopy(array2, 0, arrayFinal, array1.length, array2.length);
        
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
        
        numeros=pedirNumeros(numeros.length);
        
        //Guardar posiciones e imprimir los numeros
        System.err.println("Posiciones: ");
        for(int i=0;i<numeros.length;i++){
            if (numeros[i]%10==4){
                posiciones[contador]=i;
                System.out.print(posiciones[contador] + " ");
                contador++;
                
            }   
        }
    }
    
    //Ejercicio 14
    public static void ejercicio14(){
        
        for (int i=100; i < 300; i++){
            if (isPrimo(i))
                System.out.print(i + " ");   
        }    
    }
    
    //Ejercicio 15
    public static void ejercicio15(){
        
        int numeros[] = new int[10];
        int mayor=0;
        
        numeros=pedirNumeros(numeros.length);
       
        //Buscar numero primo mayor
        for (int i=0; i < numeros.length; i++){
            if (isPrimo(numeros[i]) && numeros[i]>mayor)
                mayor=numeros[i];
        }
        
        //Resultado
        if (mayor==0)
            JOptionPane.showMessageDialog(null, "Ninguno de los numeros introducidos era primo");
        else
            JOptionPane.showMessageDialog(null, "El numero primo mas grande es " + mayor);
        
    }
    
    //Ejercicio 16
    public static void ejercicio16(){
        int numeros[] = new int[10];
        int factoriales[]=new int[10];
        
        numeros=pedirNumeros(numeros.length);
        
        System.out.println("Factoriales: ");
        for (int i=0; i < numeros.length; i++){
            //Calcular y guardar factorial
            factoriales[i]=factorial(numeros[i]);
            System.out.print(factoriales[i] + " ");
        }
        
    }
    
    //Ejercicio 17
    public static void ejercicio17(){
        int numeros[] = new int[3];
        
        numeros=pedirNumeros(numeros.length);
        
        for (int i=0; i < numeros.length; i++){
            
            System.out.println("Entre 1 y " + numeros[i] +":");
            for(int j=2; j<numeros[i]; j++){
                System.out.print(j + " ");
            }
            System.out.println("");
        }
    }
    
    //Ejercicio 18
    public static void ejercicio18(){
        int matriz[][]=new int[6][5];
        int numero=0;
        
        for (int i=0; i < matriz.length; i++){
            for (int j=0; j < matriz[i].length;j++){
                matriz[i][j]= (int) (Math.random() * 100);
                System.out.print(matriz[i][j] + " ");
            }
            System.out.println("");
        }
    }
    
    //Ejercicio 19
    public static void ejercicio19(){
        
        int matriz[][]=new int[6][5];
        int numero=0;
        
        //Rellenar e imprimir matriz inicial
        System.out.println("Matriz inicial:");
        for (int i=0; i < matriz.length; i++){
            for (int j=0; j < matriz[i].length;j++){
                matriz[i][j]= (int) (Math.random() * 100);
                System.out.print(matriz[i][j] + " ");
            }
            System.out.println("");
        }
        
        //Matriz inicial traspuesta
        System.out.println("Matriz inicial traspuesta");
        int matrizTraspuesta[][]=new int[matriz[0].length][matriz.length];
        
        for (int i=0; i < matrizTraspuesta[0].length; i++){
            for (int j=0; j < matrizTraspuesta.length;j++){
                matrizTraspuesta[j][i]=matriz[i][j];
            }
        }
        
        //Imprimir matriz traspuesta
        for (int i=0; i < matrizTraspuesta.length; i++){
            for (int j=0; j < matrizTraspuesta[0].length;j++){
                System.out.print(matrizTraspuesta[i][j] + " ");
            }
            System.out.println("");
        }
    }
    
    //Ejercicio 20
    public static void ejercicio20(){
        int matriz[][]=new int[7][4];
        int numero=0;
        
        //Rellenar e imprimir matriz inicial
        for (int i=0; i < matriz.length; i++){
            for (int j=0; j < matriz[0].length;j++){
                
                if (i<6)
                    matriz[i][j]= (int) (Math.random() * 10);
                else
                    matriz[i][j] = sumarColumnas(matriz, j);
                
                System.out.print(matriz[i][j] + " ");
            }
            System.out.println("");
        }
    }
    
    ///////////Funciones auxiliares/////////////
    //Funcion para pedir numeros
    public static int[] pedirNumeros(int cantidad){
        
        int numeros[] = new int[cantidad];
        
        for (int i=0; i < numeros.length; i++){
            try{
                numeros[i]=Integer.parseInt(JOptionPane.showInputDialog("Introduce un numero entero (0 para salir) ("+(i+1)+")"));
                
                //Si el n�mero es 0 se para el programa
                if (numeros[i]==0)
                    System.exit(0);
                
            }catch(NumberFormatException e){
                JOptionPane.showMessageDialog(null, "Solo se permiten numeros enteros");
                i--;
            }
        }
        return numeros;
    }
    
    //Funcion para comprobar si un numero es primo
    public static boolean isPrimo(int numero){
        
        if(numero==1)
            return false;
        
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
    
    //Funcion para calcular factorial
    public static int factorial(int numero){
        
        if(numero<=0){
            return 1;
        }
        
        return factorial(numero-1)*numero;
    }
 
    //Sumar columna matriz
    public static int sumarColumnas(int[][] matriz, int indiceCol){
        
        int resultado=0;
        for (int i=0; i < matriz.length; i++){
            resultado+=matriz[i][indiceCol];
        }
        
        return resultado;
    }
}
