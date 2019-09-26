function tablaMultiplicar(num){

    document.write(
        "<table border='1'>"+
            "<th colspan='2'>TABLA DEL " + num+"</th>");
    for (i=1;i<=10;i++){

        document.write(
            "<tr>"+
                "<td>"+num+" * "+i+"</td>"+
                "<td>"+(num*i)+
            "</tr>");

    }
    document.write("</table>")
}