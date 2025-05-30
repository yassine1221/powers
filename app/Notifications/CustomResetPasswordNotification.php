<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class CustomResetPasswordNotification extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mailtrap'];
    }

    public function toMailtrap($notifiable)
    {
        $resetUrl = URL::temporarySignedRoute(
            'password.reset',
            Carbon::now()->addMinutes(Config::get('auth.passwords.users.expire')),
            ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()]
        );

        return [
            'to' => $notifiable->email,
            'name' => $notifiable->name ?? 'Utilisateur',
            'subject' => 'Réinitialisation de votre mot de passe',
            'text' => "Bonjour,\n\nCliquez ici pour réinitialiser votre mot de passe : $resetUrl\n\nCe lien expirera dans 60 minutes.",
            'html' => "<p>Bonjour,</p><p><a href=\"$resetUrl\">Cliquez ici</a> pour réinitialiser votre mot de passe.</p><p>Ce lien expirera dans 60 minutes.</p>",
        ];
    }
}
