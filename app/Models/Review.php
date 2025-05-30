<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_type',
        'rating',
        'comment',
        'verified_purchase'
    ];

    protected $casts = [
        'verified_purchase' => 'boolean',
        'rating' => 'integer'
    ];

    /**
     * Get the user that wrote the review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the rating as stars.
     */
    public function getRatingStarsAttribute()
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }

    /**
     * Get available service types.
     */
    public static function getServiceTypes()
    {
        return [
            'découpe laser' => 'Découpe Laser',
            'enseignes' => 'Enseignes',
            'design' => 'Design Graphique'
        ];
    }
}
