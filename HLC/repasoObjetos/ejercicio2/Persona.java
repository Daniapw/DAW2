/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package repasoObjetos.ejercicio2;

/**
 *
 * @author danir
 */
public class Persona {
    private String nombre="";
    private int edad=0;
    private String dni;
    private char sexo = 'H';
    private double peso=0;
    private double altura=0;
    
    //Constructores
    public Persona(){}
    
    public Persona(String nombre, int edad, char sexo){
        this.nombre=nombre;
        this.edad=edad;
        this.sexo=sexo;
        
    }
    
    public Persona(String nombre, int edad, char sexo, double peso, double altura){
        this.nombre=nombre;
        this.edad=edad;
        this.sexo=sexo;
        this.peso=peso;
        this.altura=altura;
    }
    
    public Persona(String nombre, int edad, String dni, char sexo, double peso, double altura){
        this.nombre=nombre;
        this.edad=edad;
        this.dni=dni;
        this.sexo=sexo;
        this.peso=peso;
        this.altura=altura;
    }
    
    //Metodos
    //Calcular IMC
    public int calcularIMC(){
        
        double alturaMetros=this.altura/100;
        double IMC=this.peso/(Math.pow(alturaMetros,2));
        
        if (IMC<20){
            return -1;
        }
        else if (IMC >=20 && IMC <=25){
            return 0;
        }
        else{
            return 1;
        }
    }
    
    //Comprobar si es mayor de edad
    public boolean esMayorDeEdad(){
        
        if(this.edad<18){
            return false;
        }
        
        return true;
    }
    
    //Comprobar sexo
    private void comprobarSexo(char sexo){
        
    }

    //Generar DNI
    private void generarDNI(){
        char letras[] = {'T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'};
        
        int numero=((int) Math.round(Math.random() * (99999999 - 10000000))) + 10000000;
        
        char letra=letras[numero%23];
        
        this.dni=""+numero+letra;
    }
    
    
    //toString
    @Override
    public String toString() {
        
        String str="Nombre: " + nombre +
                "\nEdad: " + edad +
                "\nSexo: " + sexo +
                "\nPeso: " + peso +
                "\nAltura: " + altura +
                "\nDNI: " + dni;
        
        return str;
    }
    
    //Getters

    public String getNombre() {
        return nombre;
    }

    public int getEdad() {
        return edad;
    }

    public String getDni() {
        return dni;
    }

    public char getSexo() {
        return sexo;
    }

    public double getPeso() {
        return peso;
    }

    public double getAltura() {
        return altura;
    }

    
    //Setters
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public void setEdad(int edad) {
        this.edad = edad;
    }

    public void setSexo(char sexo) {
        this.sexo = sexo;
    }

    public void setPeso(double peso) {
        this.peso = peso;
    }

    public void setAltura(double altura) {
        this.altura = altura;
    }
    
    
}
