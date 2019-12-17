$(function(){

    //Ajax para usuario
    //No funciona y me da un error 405 que no me ha salido nunca, pero por si acaso lo dejo
    $("#usuario").blur(function(e){
        usuario=$("#usuario");

        $.ajax({
            //Metodo por el que se va a enviar la solicitud
            type: "POST",

            //URL del archivo del servidor que va a mostrar la respuesta
            url: "ejercicio1.php",

            //Datos que seran enviados
            data:{
                usuario:usuario.val()
            },

            //Tipo de dato que va a devolver la respuesta
            dataType: "json",

            //En caso de recibir respuesta exitosa
            success: function (response) {
                if (response!=null){
                    $("#usuario").css("border-color", "red");
                    $("<p>El usuario ya esta en uso</p>").insertBefore($("#usuario"));
                }
            },

            error: function(response){
                //alert("Ha habido un error");
            }
        });
    });

    //Contrasenia
    $("#pass").blur(function (e) { 
        e.preventDefault();
        
        pass=$("#pass");

        //Validar contrasenia
        if (!validarPass(pass.val())){
            $("#textoError").text("La contraseña debe tener entre 8 y 10 caracteres");
            return false;
        }
        else{
            $("#textoError").text("");
            $("#pass2Span").css("display", "inline");
        }
    });

    //Validar contrasena 2
    $("#pass2").blur(function(e){
        pass1=$("#pass");
        pass2=$("#pass2");

        //Si las contrasenias no coinciden se mostrara la imagen animada
        if (pass1.val()!=pass2.val()){
            $("#imagen").fadeIn(2000);

            $("#imagen").animate({
                marginLeft:"+=300",
                width: "+=50"
            }, 2000, function(e){
                $("#imagen").animate({
                    marginLeft:"-=300",
                    width: "-=50"
                }, 2000);

                $("#imagen").fadeOut(2000)
            })
        }
        //Si coinciden se habilita el boton de enviar
        else{
            //Validar nombre
            if (!validarNombre($("#usuario").val()))
                alert("Debe introducir un usuario");
            else
                $("#enviarForm").prop("disabled", false);

        }
    })

    
})

//Funcion para validar contraseña
function validarPass(pass){
    if (pass.length<8 || pass.length>10)
        return false;

    return true;
}

function validarNombre(nombre){
    if (nombre.length>0)
        return true;
    

    return false;
}