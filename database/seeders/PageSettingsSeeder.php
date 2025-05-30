<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageSetting;

class PageSettingsSeeder extends Seeder
{
    public function run()
    {
        $pages = [
            [
                'page_name' => 'home',
                'hero_title' => 'Perfect Sings – Découpe laser, enseignes & design graphique',
                'hero_description' => 'Donnez vie à vos idées grâce à notre expertise en découpe de précision, création d\'enseignes sur mesure et design graphique unique.',
            ],
            [
                'page_name' => 'services',
                'hero_title' => 'Nos Services',
                'hero_description' => 'Des solutions sur mesure pour tous vos projets',
            ],
            [
                'page_name' => 'portfolio',
                'hero_title' => 'Nos Réalisations',
                'hero_description' => 'Découvrez nos projets et réalisations exceptionnels',
            ],
            [
                'page_name' => 'about',
                'hero_title' => 'À propos de nous',
                'hero_description' => 'Découvrez notre histoire et notre expertise',
            ],
            [
                'page_name' => 'contact',
                'hero_title' => 'Contactez-nous',
                'hero_description' => 'Nous sommes là pour répondre à toutes vos questions',
            ],
            [
                'page_name' => 'login',
                'hero_title' => 'Connexion',
                'hero_description' => 'Accédez à votre espace personnel',
            ],
            [
                'page_name' => 'register',
                'hero_title' => 'Inscription',
                'hero_description' => 'Créez votre compte pour accéder à plus de fonctionnalités',
            ],
            [
                'page_name' => 'reviews',
                'hero_title' => 'Avis Clients',
                'hero_description' => 'Découvrez ce que nos clients pensent de nos services',
            ],
        ];

        foreach ($pages as $page) {
            PageSetting::updateOrCreate(
                ['page_name' => $page['page_name']],
                $page
            );
        }
    }
}
