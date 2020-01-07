<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
//Modificación de multiples campos
protected $fillable=["numero_orden","titulo","capitulo_padre_id, libro_id"];

//Metodos

//Relaciones
    /**
    * Relacion 1:N(inverso) con libro
    */
    public function libro()
    {
        return $this->belongsTo('App\Libro');
    }
    /**
    * Relacion 0:N con capitulo (capitulo padre)
    */
    public function capitulo()
    {
        return $this->hasMany('App\Capitulo');
    }



    /**
    * Relacion 1:N con paginas
    */
    public function paginas()
    {
        return $this->hasMany('App\Pagina');
    }




    /**
     * Relacion 1:N con multimedia ¿?----------------------------------------EN PROCESO
     */
    public function imagenes()
    {
        return $this->hasMany('App\Imagen');
    }
    public function galerias()
    {
        return $this->hasMany('App\Galeria');
    }
    public function videos()
    {
        return $this->hasMany('App\Video');
    }
    public function descargas()
    {
        return $this->hasMany('App\Descarga');
    }
    public function modelos_3d()
    {
        return $this->hasMany('App\Modelo_3d');
    }
}
