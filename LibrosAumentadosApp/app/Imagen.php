<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
//Modificación de multiples campos
protected $fillable=["titulo","descripcion","imagen",'capitulo_id'];

//Metodos

    




//Relaciones
    /**
    * Relacion N:N galeria_imagen
    */
    public function galerias()
    {
        return $this->belongsToMany('App\Galeria', 'galeria_imagen', 'galeria_id','imagen_id');
    }

    //Relacion 1:N(inversa) ¿¿-------------------??Dudo que esto sea lo mejor :(
        public function capitulo()
        {            
            return $this->belongsTo('App\Capitulo');
        }  
}
