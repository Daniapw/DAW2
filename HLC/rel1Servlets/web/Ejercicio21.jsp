<%-- 
    Document   : Ejercicio21
    Created on : 05-nov-2019, 9:53:51
    Author     : diurno
--%>

<%@page import="java.util.ArrayList"%>
<%@page import="java.util.List"%>
<%@page import="java.util.Arrays"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        
        <%
        if (request.getParameter("enviar")!=null){
            //Recoger parametros
            String estatuas[]=request.getParameterValues("estatuas");
            
            //Declarar variables para calcular promedios
            double promedioGeneral=0;
            double promedioBajas=0;
            int numBajas=0;
            double numero=0;
            
            //Recorrer array de parametros y sumar
            for (String estatura:estatuas){
                numero=Double.parseDouble(estatura);
                
                if (numero<1.6){
                    numBajas++;
                    promedioBajas+=numero;
                }
                
                promedioGeneral+=numero;  
            }
            
            //Calcular promedios
            promedioGeneral/=estatuas.length;
            promedioBajas/=numBajas;
            
            //Mostrar resultados
            out.println("Promedio general: " + promedioGeneral +"<br>"
                    + "Promedio bajas: ("+numBajas+"): " + promedioBajas);
            
            
        }
        else{%>
            <form action="Ejercicio21.jsp" method="post">

                Estatua 1: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 2: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 3: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 4: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 5: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 6: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 7: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 8: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 9: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 10: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 11: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 12: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 13: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 14: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>
                Estatua 15: <input type="number" step="0.1" min="0.1" name="estatuas" required><br>

                <input type="submit" name="enviar" value="Enviar"/>
            </form>
        <%
        }%>
    </body>
</html>
