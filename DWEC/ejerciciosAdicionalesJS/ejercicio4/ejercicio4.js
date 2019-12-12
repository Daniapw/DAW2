$(function(){
    //Listener para evento click en texto
    $("#texto").click(function(){
        $("body").css("background-image", "url('paisaje.jpg')");
    });

    //Listener para evento keydown
    $(document).keydown(function (e) { 
        if (e.altKey){
            if (e.keyCode==123)
                $("body").css("background-image", "url('paisaje.jpg')");
        }
    });
})