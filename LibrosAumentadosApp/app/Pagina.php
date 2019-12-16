<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
//Modificación de multiples campos
protected $fillable=["numero_pagina","texto","capitulo_id"];

//Metodos

//Relaciones
    /**
     * Relacion 1:N(inverso) con capitulo
     */
    public function capitulo()
    {
        return $this->belongsTo('App\Capitulo');
    }
}
