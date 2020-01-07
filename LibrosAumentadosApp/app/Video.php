<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
//Modificación de multiples campos
protected $fillable=["titulo","descripcion","video",'capitulo_id'];

//Metodos

//Relaciones








//Relacion 1:N(inversa) ¿¿-------------------??Dudo que esto sea lo mejor :(
    public function capitulo()
    {            
        return $this->belongsTo('App\Capitulo');
    }  
}
