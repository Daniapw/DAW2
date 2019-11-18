$(function(){

    $("form input[name=segundo]").prop('disabled', true);

    $("#form1 select[name=curso]").change(function () { 
        if ($("#form1 select[name=curso] option[selected]").val()=="primero"){
            $("#form1 input[name=segundo]").prop('disabled', true);
            $("#form1 input[name=primero]").prop('disabled', false);
        }
        else{
            $("#form1 input[name=primero]").prop('disabled', true);
            $("#form1 input[name=segundo]").prop('disabled', false);
        }
    });

    $("#form1").validate({
        rules:{
            apellidos:{
                required:true,
                lettersOnly:true
            },

            nombre:{
                required:true,
                lettersOnly:true
            },

            domicilio:{
                required:true,
                lettersOnly:true
            },

            sexo:'required',


        },

        messages:{
            apellidos:'Error'
        }
    })
})