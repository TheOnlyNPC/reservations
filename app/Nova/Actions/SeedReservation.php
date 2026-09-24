<?php

namespace App\Nova\Actions;

use App\Models\Reservation;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Actions\ActionResponse;
use Laravel\Nova\Contracts\BatchableAction;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

class SeedReservation extends Action implements ShouldQueue, BatchableAction
{
    use Batchable;
    use InteractsWithQueue;
    use Queueable;

    /**
     * Perform the action on the given models.
     *
     * @return mixed
     */
    public $standalone = true;

    public function handle(ActionFields $fields, Collection $models)
    {
        Reservation::factory()->count($fields->count)->create();

        return Action::message($fields->count . ' Aircraft seeded!');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array<int, \Laravel\Nova\Fields\Field>
     */
    public function fields(NovaRequest $request): array
    {
        return [
            Number::make('Count')->rules('required', 'min:1')->default(10)
        ];
    }
}
