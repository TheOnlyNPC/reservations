<?php

namespace App\Nova\Metrics;

use App\Models\Aircraft;
use App\Models\Reservation;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;
use Laravel\Nova\Metrics\TrendResult;
use Laravel\Nova\Nova;

class AircraftReservations extends Trend
{
    public $name = 'Reservations';
    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request): TrendResult
    {
        $range = $request->input('range', 7);
        $start = Carbon::now()->subDays($range)->endOfDay();
        $end = Carbon::now()->endOfDay();

        if ($range < 0) {
            $start = Carbon::now()->endOfDay();
            $end = Carbon::now()->addDays(abs($range));
        }

        $period = CarbonPeriod::between($start, $end);

        $trendData = [];
        foreach ($period as $day) {
            $dayStart = $day->copy()->startOfDay()->toDateTimeString();
            $dayEnd = $day->copy()->endOfDay()->toDateTimeString();

            $count = Reservation::
                where('starts_at', '>=', $dayStart)
                ->where('ends_at', '<=', $dayEnd)
                ->count();

            $trendData[$day->format('M j, Y')] = $count;    
        }

        return $this->result()
            ->trend($trendData)
            ->showSumValue();
    }    

    /**
     * Get the ranges available for the metric.
     *
     * @return array<int, string>
     */
    public function ranges(): array
    {
        return [
            7 => Nova::__('Past Week'),
            30 => Nova::__('Past Month'),
            -7 => Nova::__('Next Week'),
            -30 => Nova::__('Next Month'),
        ];
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     */
    public function cacheFor(): DateTimeInterface|null
    {
        // return now()->addMinutes(5);

        return null;
    }

    /**
     * Get the URI key for the metric.
     */
    public function uriKey(): string
    {
        return 'aircraft-reservations';
    }
}
