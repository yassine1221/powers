<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    protected $fillable = [
        'page_name',
        'hero_background',
        'hero_title',
        'hero_description'
    ];

    public static function getPages()
    {
        return [
            'home' => 'Accueil',
            'services' => 'Services',
            'portfolio' => 'Portfolio',
            'contact' => 'Contact',
            'about' => 'À propos'
        ];
    }

    public function getHeroBackgroundUrlAttribute()
    {
        return $this->hero_background ? asset('storage/' . $this->hero_background) : null;
    }
}
