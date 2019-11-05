<%-- 
    Document   : Ejercicio22
    Created on : 05-nov-2019, 10:18:26
    Author     : diurno
--%>

<%@page import="java.util.Map.Entry"%>
<%@page import="java.util.Iterator"%>
<%@page import="java.util.HashMap"%>
<%@page import="java.util.List"%>
<%@page import="java.util.ArrayList"%>
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
            String numeros[]=request.getParameterValues("numeros");
            HashMap<String,Integer> hmNumeros=new HashMap<String,Integer>();
            int contador=0;
            
            
            //Contar numeros
            for (String numero:numeros){
                
                //Si el numero no esta en el hashmap (no ha sido buscado)
                if (!hmNumeros.containsKey("numero")){
                    contador=0;
                    for (String numeroBuscado:numeros){
                        if (numero.equals(numeroBuscado))
                            contador++;
                    }
                    
                    hmNumeros.put(numero, contador);
                }
            }
            
            //Imprimir numeros
            %>
            <table border='1'>
                <tr>
                    <th>Numero</th>
                    <th>Ocurrencias</th>
                </tr>
            <%
            for (Entry<String, Integer> numero : hmNumeros.entrySet()) {
                out.println("<tr>");
                    out.println("<td>" + numero.getKey() + "</td>");
                    out.println("<td>" + numero.getValue() + "</td>");
                out.println("</tr>");
            }
            out.println("</table>");
            
        }
        else{%>
            <form action="Ejercicio22.jsp" method="post">
                Numero 1: <input type="number" min="1" max="5" name="numeros" required><br>
                Numero 2: <input type="number" min="1" max="5" name="numeros" required><br>
                Numero 3: <input type="number" min="1" max="5" name="numeros" required><br>
                Numero 4: <input type="number" min="1" max="5" name="numeros" required><br>
                Numero 5: <input type="number" min="1" max="5" name="numeros" required><br>
                Numero 6: <input type="number" min="1" max="5" name="numeros" required><br>
                Numero 7: <input type="number" min="1" max="5" name="numeros" required><br>
                Numero 8: <input type="number" min="1" max="5" name="numeros" required><br>
                Numero 9: <input type="number" min="1" max="5" name="numeros" required><br>
                Numero 10: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 11: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 12: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 13: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 14: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 15: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 16: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 17: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 18: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 19: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 20: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 21: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 22: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 23: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 24: <input type="number" name="numeros"  min="1" max="5" required><br>
                Numero 25: <input type="number" name="numeros"  min="1" max="5" required><br>
                
                <input type="submit" name="enviar" value="Enviar"/>
            </form>
        <%
        }%>
    </body>
</html>
