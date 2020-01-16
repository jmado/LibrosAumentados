<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
//Modificación de multiples campos
protected $fillable=["titulo","descripcion","tipo","capitulo_id"];

//Metodos

//Relaciones
    /**
    * Relacion N:N galeria_imagen
    */
    public function imagenes()
    {
        return $this->belongsToMany('App\Imagen', 'galeria_imagen', 'galeria_id','imagen_id');
    }

    //Relacion 1:N(inversa) ¿¿-------------------??Dudo que esto sea lo mejor :(
        public function capitulo()
        {            
            return $this->belongsTo('App\Capitulo');
        }  
}
