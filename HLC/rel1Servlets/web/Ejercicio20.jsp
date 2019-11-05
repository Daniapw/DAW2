<%-- 
    Document   : Ejercicio20
    Created on : 05-nov-2019, 9:44:58
    Author     : diurno
--%>

<%@page import="java.util.Collections"%>
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
        
            int multiplo=1;
            int multiplicador=1;
            
            List<Integer> multiplos=new ArrayList<Integer>();
            
            while(multiplo<100){
                
                multiplo=5*multiplicador;
                
                multiplos.add(multiplo);
                
                multiplicador++;
            }
            
            Collections.reverse(multiplos);
            
            for (Integer numero:multiplos){
                out.println(numero + " ");
            }
            
        %>
    </body>
</html>
