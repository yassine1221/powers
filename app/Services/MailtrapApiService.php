<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MailtrapApiService
{
    protected $apiToken;
    protected $apiUrl = 'https://send.api.mailtrap.io/api/send';

    public function __construct()
    {
        // Récupère ton token Mailtrap depuis .env
        $this->apiToken = config('mail.mailtrap_api_token');

        if (!$this->apiToken) {
            Log::error('Mailtrap API Token is not set.');
        }
    }

    /**
     * Envoie un mail via Mailtrap API
     * 
     * @param string $to       Email destinataire
     * @param string $name     Nom destinataire
     * @param string $subject  Sujet de l'email
     * @param string $text     Texte brut
     * @param string|null $html Contenu HTML optionnel
     * 
     * @return bool|string     true si OK, message d’erreur sinon
     */
    public function sendMail($to, $name, $subject, $text, $html = null)
    {
        // Pour la sandbox Mailtrap : forcer $to à ton email autorisé
        $allowedTestEmail = config('mail.mailtrap_test_email');
        if ($allowedTestEmail) {
            $to = $allowedTestEmail;
            $name = 'Test User';
        }

        $payload = [
            'from' => [
                'email' => 'hello@demomailtrap.co', // domaine autorisé Mailtrap
                'name' => 'Mon Application',
            ],
            'to' => [
                [
                    'email' => $to,
                    'name' => $name,
                ],
            ],
            'subject' => $subject,
            'text' => $text,
            'html' => $html,
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiToken,
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, $payload);

        if ($response->successful()) {
            return true;
        }

        Log::error('Mailtrap API Error: ' . $response->body());
        return $response->body();
    }
}
