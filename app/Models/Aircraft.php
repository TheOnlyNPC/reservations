<?php

namespace App\Models;

use App\AircraftStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aircraft extends Model
{
    protected $fillable = ['type_id', 'status', 'registration'];
    protected $table = 'aircrafts';

    protected $casts = [
        'status' => AircraftStatus::class,
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    function reservations(): HasMany {
        return $this->hasMany(Reservation::class);
    }
}