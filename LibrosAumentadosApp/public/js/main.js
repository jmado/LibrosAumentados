
    


function modalfuncion(){
    console.log(tasks);
}
    





// ---------------Visualizacion de galerias----------------------
function transparencia(){
    var imagenes = document.getElementsByClassName('galeria-img'); 
    var rangos = document.getElementsByClassName('rango'); 
    
    if(imagenes.length>2){
        for(var i=0; i<imagenes.length; i++){
            imagenes[i].style["opacity"] = rangos[i].value/100;
        }
    }
    else{
        var rango = rangos[0].value;
        var valor = rango / 100;
        imagenes[0].style["opacity"] = 100 - valor;
        imagenes[1].style["opacity"] = valor;
    }
    
}

var galeria = document.getElementsByClassName("imagenes");
var cont = 0;
function izquierda(){
    if(galeria[0].className != "active galeria-img imagenes"){
        galeria[cont].className = "galeria-img imagenes";
        cont--;
        galeria[cont].className = "active galeria-img imagenes";
    }
}
function derecha(){
    if(galeria[galeria.length-1].className != "active galeria-img imagenes"){
        galeria[cont].className = "galeria-img imagenes";
        cont++;
        galeria[cont].className = "active galeria-img imagenes";
    }   
}