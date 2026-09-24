<?php

namespace App\Models;

use App\AircraftStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Nova\Actions\Actionable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class Aircraft extends Model
{
    use HasFactory;
    use Actionable;
    use HasApiTokens;

    protected $fillable = ['type_id', 'status', 'registration'];
    protected $table = 'aircrafts';

    protected function casts(): array
    {
        return [
            'status' => AircraftStatus::class,
        ];
    }
       

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    function reservations(): HasMany {
        return $this->hasMany(Reservation::class);
    }
}