<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Types extends Model
{
    protected $fillable = ['name', 'seats', 'fuel_capacity'];

    function aircrafts(): HasMany {
        return $this->hasMany(Aircrafts::class);
    }
}
