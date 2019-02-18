<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receta extends Model
{
    //Aplicando Soft Delete al borrar registro
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'recetas';
    protected $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'descripcion', 'imagen', 'elaboracion', 'ingredientes', 'user_id', 'categoria', 'notif_creation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

   	public function user(){
        return $this->belongsTo('App\User');
    }

    public function users(){ //usuarios que han dado favorito a la receta
        return $this->belongsToMany('App\User');
    }

    public function comentarios(){
    	return $this->hasMany('App\Comentario');
    }
}
