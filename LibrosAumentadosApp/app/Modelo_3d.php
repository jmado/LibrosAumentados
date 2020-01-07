<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo_3d extends Model
{
//Modificación de multiples campos
protected $fillable=["titulo","descripcion","modelo_3d",'capitulo_id'];

//Metodos

//Relaciones








//Relacion 1:N(inversa) ¿¿-------------------??Dudo que esto sea lo mejor :(
    public function capitulo()
    {            
        return $this->belongsTo('App\Capitulo');
    }  
}
