$(function(){

    $(".cuadrado").mouseenter(mouseDentro);

    $(".cuadrado").mouseout(function(){
        $("body").css("background-color", "white");
    });
});

function mouseDentro(event){
    
    colorFondo=$("#"+event.target.id).css("background-color");

    console.log(colorFondo);

    $("body").css("background-color", colorFondo);

}