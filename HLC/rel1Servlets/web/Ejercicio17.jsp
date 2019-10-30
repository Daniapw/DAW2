<%-- 
    Document   : Ejercicio17
    Created on : 30-oct-2019, 13:35:33
    Author     : diurno
--%>

<%@page import="javax.swing.JOptionPane"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            int numero=-1;
            
            do{
                
                try{
                    numero=Integer.parseInt(JOptionPane.showInputDialog("Introduce un numero entero diferente a 0"));
                    
                    if (numero>0)
                        out.println("El numero es positivo<br>");
                    else if(numero<0)
                        out.println("El numero es negativo<br>");
                    
                }catch(NumberFormatException e){
                    JOptionPane.showMessageDialog(null, "Solo se permiten numeros enteros");
                }

                
            }while(numero!=0);
        
        %>
    </body>
</html>
