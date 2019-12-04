$(function(){
    $("#texto").click(function(){
        $("body").css("background-image", "url('paisaje.jpg')");
    });

    $(document).keypress(function (e) { 
        console.log(e.keyCode);
        if (e.altKey)
            if (e.keyCode==123)
                $("body").css("background-image", "url('paisaje.jpg')");

    });
})