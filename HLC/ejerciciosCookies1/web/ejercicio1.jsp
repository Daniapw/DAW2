<%-- 
    Document   : ejercicio1-A
    Created on : 13-nov-2019, 12:07:36
    Author     : diurno
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%! Cookie[] cs; %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
        cs=request.getCookies();

        //Si no hay mas de una cookie (contando la cookie JSessionID)
        if (cs.length<2){
            out.println("<h1>Bienvenido</h1>");

            //Crear cookie con valor y anadirla
            Cookie c =new Cookie("contador", "0");
            c.setMaxAge(300);
            response.addCookie(c);
        }
        //Si hay mas de una cookie
        else{

            //Se recorren las cookies
            for (Cookie c:cs){
                
                //Se busca la cookie contador
                if (c.getName().equals("contador")){
                    //Se recoge el valor y se aumenta en 1
                    Integer valorC=Integer.parseInt(c.getValue());
                    valorC++;
                    
                    //Se asigna el valor y la 'edad maxima' de la cookie en segundos
                    c.setValue(valorC.toString());
                    c.setMaxAge(300);
                    
                    //Se vuelve a anadir la cookie y se muestra el contador
                    response.addCookie(c);
                    
                    out.println("<h1>Bienvenido de nuevo</h1><br>"
                      + "Contador de visitas: " + c.getValue());
                }
            }


        }
              
        %>
    </body>
</html>
