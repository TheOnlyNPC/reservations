<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Nova\Actions\Actionable;
use Laravel\Sanctum\HasApiTokens;

class Type extends Model
{
    use Actionable;
    use HasApiTokens;
    
    protected $fillable = ['name', 'seats', 'fuel_capacity'];

    function aircrafts(): HasMany {
        return $this->hasMany(Aircraft::class);
    }
}
