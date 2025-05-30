<?php

namespace App\Http\Controllers;

use App\Services\MailtrapApiService;


class MailController extends Controller
{
    protected $mailtrap;

    public function __construct(MailtrapApiService $mailtrap)
    {
        $this->mailtrap = $mailtrap;
    }

    public function sendTestMail()
    {
        $sent = $this->mailtrap->sendMail(
            'destinataire@example.com',
            'Jean Dupont',
            'Test Email via Mailtrap API',
            'Bonjour, ceci est un test envoyé via l’API Mailtrap.',
            '<p>Bonjour, ceci est un test <strong>envoyé via l’API Mailtrap</strong>.</p>'
        );

        if ($sent) {
            return 'Email envoyé avec succès !';
        } else {
            return 'Erreur lors de l’envoi du mail.';
        }
    }
}
