<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aircrafts extends Model
{
    protected $fillable = ['type_id', 'status', 'registration'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Types::class, 'type_id');
    }

    function reservations(): HasMany {
        return $this->hasMany(Reservations::class);
    }
}
