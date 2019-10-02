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
public class Password {
    private int longitud=8;
    private String contrasena="";
    private static final String CARACTERES="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    
    //Constructores
    public Password(){
        generarPassword();
    }
    
    public Password(int longitud){
        
        if (longitud<1)
            this.longitud=8;
        else
            this.longitud=longitud;
        
        generarPassword();
    }
    
    //Generar contrasena
    private void generarPassword(){
        
        int indice;
        for (int i=0; i < this.longitud; i++){
            indice=((int) (Math.random()*(CARACTERES.length()-1)));
            contrasena=contrasena+CARACTERES.charAt(indice);
        }
        
  
    }
    
    //Comprobar si es fuerte
    public boolean esFuerte(){
        
        int mayusculas=0, minusculas=0, numeros=0;
        char caracter;
        for(int i=0; i<contrasena.length();i++){
            
            caracter=contrasena.charAt(i);
            
            if(Character.isDigit(caracter)){
                numeros++;
            }
            else if(Character.isLowerCase(caracter)){
                minusculas++;
            }
            else if(Character.isUpperCase(caracter)){
                mayusculas++;
            }
            
        }
        System.out.println(contrasena +
                "\nNumeros: " + numeros +
                "\nMayusculas: " + mayusculas+
                "\nMinusculas: " + minusculas);
        
        if (numeros>5 && minusculas>1 && mayusculas>2){
            return true;
        }
        
        return false;
    }

    //Getters
    public int getLongitud() {
        return longitud;
    }

    public String getContrasena() {
        return contrasena;
    }
    
    //Setters
    public void setLongitud(int longitud) {
        this.longitud = longitud;
    }
    
}
