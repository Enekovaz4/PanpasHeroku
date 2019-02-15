<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    //Aplicando Soft Delete al borrar registro
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'comentarios';
    protected $primarykey = 'id';

    public function users(){
    	return $this->belongsToMany('App\User');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function receta(){
    	return $this->belongsTo('App\Receta');
    }
}
