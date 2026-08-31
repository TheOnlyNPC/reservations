<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservations extends Model
{
    protected $fillable = [
        'user_id',
        'aircraft_id',
        'starts_at',
        'ends_at',
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    function aircraft(): BelongsTo{
        return $this->belongsTo(Aircrafts::class);
    }
}
