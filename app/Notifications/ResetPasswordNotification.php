<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    //[*] Copiado de /vendor/laravel/framework/src/Illuminate/Auth/Notifications/ResetPassword.php

    //[*]
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    //[*]
    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a new notification instance.
     *
     * @param  string  $token       //[*]
     * @return void
     */
    public function __construct($token)//[*]
    {
        $this->token = $token;//[*]
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {//[*]
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->subject(Lang::getFromJson('Notificación de Reseteo de Contraseña'))
            ->line(Lang::getFromJson('Has recibido este email porque nos llegó una petición de reseteo de la contraseña de tu cuenta.'))
            ->action(Lang::getFromJson('Resetear Contraseña'), url(config('app.url').route('password.reset', $this->token, false)))
            ->line(Lang::getFromJson('Este reseteo de contraseña expirará en :count minutos.', ['count' => config('auth.passwords.users.expire')]))
            ->line(Lang::getFromJson('Si no demandaste resetear tu contraseña, no hagas caso de lo demandado en este correo y perdona las molestias.'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
