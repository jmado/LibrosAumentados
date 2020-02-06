
// ---------------Visualizacion de galerias----------------------
function transparencia(){
    var rango = document.getElementById("rango").value;
    var valor = rango / 100;
    galeria[0].style["opacity"] = 100 - valor;
    galeria[1].style["opacity"] = valor;
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