<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'canvas_image',
        'icon'
    ];

    protected $table = 'categories';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot(['service_price', 'service_coach_levels_prices', 'price_type']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function seasonTickets()
    {
        return $this->belongsToMany(SeasonTicket::class)->withPivot(['season_ticket_price', 'season_ticket_coach_levels_prices', 'price_type']);
    }
}
