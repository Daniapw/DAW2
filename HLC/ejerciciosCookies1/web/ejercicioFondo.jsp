<%-- 
    Document   : ejercicioFondo
    Created on : 06-nov-2019, 13:36:26
    Author     : diurno
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%! Cookie[] cs;%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        
        <style>
            <%
            
            if (cs!=null){
                out.println("<!--HE ENTRADO EN STYLES-->");
                for (Cookie c:cs){
                    if (c.getName().equals("color"))
                        out.println("body{background-color:"+c.getValue()+";}");
                }
            
            }
            %>
        </style>
    </head>
    <body>
        
        <%
        
        cs=request.getCookies();
        
        if (cs==null){%>
            <form action="ejercicioFondo.jsp" method="post">
                Usuario: <input type="text" name="usuario"/><br>
                Color de fondo:
                <select name="color">
                    <option value="red">Rojo</option>
                    <option value="blue">Azul</option>
                    <option value="brown">Marrón</option>
                    <option value="green">Verde</option>
                    <option value="yellow">Amarillo</option>
                </select><br>

                <input type="submit" name="enviar" value="Enviar"/>
            </form>
        <%
        }
        else{
            String color=request.getParameter("color");
            Cookie c=new Cookie("color", color);
            
            c.setMaxAge(60);
            
            response.addCookie(c);
            
            out.println("Ya ha entrado aqui");
        }%>
    </body>
</html>
