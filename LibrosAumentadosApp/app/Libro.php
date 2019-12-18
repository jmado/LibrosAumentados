<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    
//Modificación de multiples campos
protected $fillable=["id","titulo","autor","subtitulo","cubierta"];

//Metodos

//Relaciones
    /**
    * Relacion 1:N con capitulos
    */
    public function capitulos()
    {
        return $this->hasMany('App\Capitulo');
    }

}
