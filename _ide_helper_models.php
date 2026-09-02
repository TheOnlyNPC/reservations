<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $type_id
 * @property string $status
 * @property string $registration
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reservations> $reservations
 * @property-read int|null $reservations_count
 * @property-read \App\Models\Types $type
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aircrafts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aircrafts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aircrafts query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aircrafts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aircrafts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aircrafts whereRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aircrafts whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aircrafts whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aircrafts whereUpdatedAt($value)
 */
	class Aircrafts extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $aircraft_id
 * @property string $starts_at
 * @property string $ends_at
 * @property-read \App\Models\Aircrafts $aircraft
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservations newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservations newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservations query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservations whereAircraftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservations whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservations whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservations whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservations whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservations whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservations whereUserId($value)
 */
	class Reservations extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int $seats
 * @property int|null $fuel_capacity
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Aircrafts> $aircrafts
 * @property-read int|null $aircrafts_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Types newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Types newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Types query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Types whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Types whereFuelCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Types whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Types whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Types whereSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Types whereUpdatedAt($value)
 */
	class Types extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reservations> $reservations
 * @property-read int|null $reservations_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

