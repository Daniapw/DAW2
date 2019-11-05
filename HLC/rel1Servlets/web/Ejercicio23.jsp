<%-- 
    Document   : ejercicio23
    Created on : 05-nov-2019, 18:33:36
    Author     : danir
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
        if (session.isNew()){
            int numero=((int) Math.round(Math.random() * (10 - 1))) + 1;
            session.setAttribute("numeroSecreto", numero);
            session.setAttribute("intentos", 0);
            session.setAttribute("acertado", new Boolean(false));
        }
        
        %>
        
        <h1>Adivina el numero entre 1 y 10</h1>
        
        <%
        if (request.getParameter("enviar")!=null){
            
            Integer numIntentos=(Integer) session.getAttribute("intentos");
            numIntentos++;
            
            session.setAttribute("intentos", numIntentos);
            
            Integer numEnviado=Integer.parseInt(request.getParameter("numero"));
                
            if (session.getAttribute("numeroSecreto")==numEnviado){
                out.println("Has acertado, era el numero "+ session.getAttribute("numeroSecreto") +" !");
                session.setAttribute("acertado", true);
            }
            else{
                out.println("Incorrecto, prueba otra vez");
            }
        }
        
        if (!((Boolean) session.getAttribute("acertado"))){%>
        
        <form action='Ejercicio23.jsp' method='post'>
            Numero: <input type='number' min='1' max='1000'name='numero' required/><br>
            <input type='submit' value='Enviar' name='enviar'/>
        </form>
        <%
        }%>
    </body>
</html>
