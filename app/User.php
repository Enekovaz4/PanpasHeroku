<?php

namespace App;

use Cache;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    //Aplicando Soft Delete al borrar registro
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $primarykey = "username";
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'lastname', 'email', 'password', 'perfil_id', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * :: Personalización ::
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification);
    }

    /**
     * :: Personalización ::
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function perfil(){
        return $this->belongsTo('App\Perfil');
    }

    public function recetas(){
        return $this->hasMany('App\Receta');
    }
    public function favoritos(){
        return $this->belongsToMany('App\Receta');
    }

    public function panaderias(){
        return $this->hasMany('App\Panaderia');
    }

    public function comentarios(){
        return $this->belongsToMany('App\Comentario');
    }

    public function comentario(){
        return $this->hasOne('App\Comentario');
    }

    public function followers(){
        return $this->belongsToMany('App\User', 'user_user', 'followed', 'follower');
    }

    public function follows(){
        return $this->belongsToMany('App\User', 'user_user', 'follower', 'followed');
    }

    /**
     * Comprobando si el usuario está online.
     *
     */
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

}
