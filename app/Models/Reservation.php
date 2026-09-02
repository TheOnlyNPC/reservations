<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'aircraft_id',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at'   => 'datetime',
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    function aircraft(): BelongsTo{
        return $this->belongsTo(Aircraft::class);
    }
}
