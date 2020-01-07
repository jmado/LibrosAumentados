<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
//Modificación de multiples campos
protected $fillable=["titulo","descripcion","audio",'capitulo_id'];

//Metodos

//Relaciones








//Relacion 1:N(inversa) ¿¿-------------------??Dudo que esto sea lo mejor :(
    public function capitulo()
    {            
        return $this->belongsTo('App\Capitulo');
    }  
}
