$(function(){

    $("#formulario").submit(function(event){
        salario=$("input[name=salario]").val();
        edad=$("input[name=edad").val();
        event.preventDefault();

        //Si el salario es menor que 1000
        if (salario<1000){
            if (edad>50 && edad<60)
                salario*=1.15;
            else if(edad<50)
                salario*=1.075;
            else
                salario*=1.2;
        }

        //Si el salario esta entre 1000 y 2000
        if (salario>1000 && salario<2000){

            if (edad>50)
                salario*=1.1;
            else
                salario*=1.05;

        }

        elementoSalarioFinal=$("#formulario input[name=salarioFinal]");
        if (elementoSalarioFinal.length>0)
            elementoSalarioFinal.val(salario);
        else
            $("#formulario input[name=salario]").after("<br> Salario final:<input type='text' name='salarioFinal' value='"+salario+"' disabled/>");
    });

});