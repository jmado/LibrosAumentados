
// ---------------Visualizacion de galerias----------------------
function transparencia(){
    var imagenes = document.getElementsByClassName('galeria-img'); 
    var rangos = document.getElementsByClassName('rango'); 
    
    for(var i=0; i<imagenes.length; i++){
        imagenes[i].style["opacity"] = rangos[i].value/100;
    }
}

var galeria = document.getElementsByClassName("galeria-img");
var cont = 0;
function izquierda(){
    if(galeria[0].className != "active galeria-img"){
        galeria[cont].className = "galeria-img";
        cont--;
        galeria[cont].className = "active galeria-img";
    }
}
function derecha(){
    if(galeria[galeria.length-1].className != "active galeria-img"){
        galeria[cont].className = "galeria-img";
        cont++;
        galeria[cont].className = "active galeria-img";
    }   
}