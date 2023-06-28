<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeasonTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'duration',
        'description',
        'image',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot(['season_ticket_price', 'season_ticket_coach_levels_prices', 'price_type']);
    }
}
