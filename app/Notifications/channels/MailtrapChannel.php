<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use App\Services\MailtrapApiService;

class MailtrapChannel
{
    protected $mailtrap;

    public function __construct(MailtrapApiService $mailtrap)
    {
        $this->mailtrap = $mailtrap;
    }

    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toMailtrap($notifiable);

        $this->mailtrap->sendMail(
            $message['to'],
            $message['name'] ?? '',
            $message['subject'],
            $message['text'],
            $message['html'] ?? null
        );
    }
}
