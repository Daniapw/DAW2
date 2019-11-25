$(function(){

    $("#dni").blur(function () { 

        $.ajax({
            //Metodo por el que se va a enviar la solicitud
            type: "POST",

            //URL del archivo del servidor que va a mostrar la respuesta
            url: "metodoAjax.php",

            //Datos que seran enviados
            data:{
                dni:$("#dni").val()
            },
            //Tipo de dato que va a devolver la respuesta
            dataType: "json",

            //En caso de recibir respuesta exitosa
            success: function (response) {
                $("#nombre").val(response.nombre);
                $("#apellidos").val(response.apellidos);
                $("#domicilio").val(response.domicilio);
                $("#email").val(response.email);
                $("#telefono").val(response.telefono);
            },

            error: function(response){
                alert("Error, no se ha encontrado a esa persona");
            }
        });
    });

});