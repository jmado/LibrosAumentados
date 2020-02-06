<?php

namespace App;
use DB;

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

    public static function getCapitulos($id_libro)
    {
        $capitulos = DB::table('capitulos')->where('libro_id', $id_libro)->get();
        return $capitulos;
    }

    public static function getPaginas($capitulo)
    {
        $paginas = DB::table('paginas')->where('capitulo_id', $capitulo)->get();
        return $paginas;
    }


}
