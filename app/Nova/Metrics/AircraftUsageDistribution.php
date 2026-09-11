<?php

namespace App\Nova\Metrics;

use App\Models\Aircraft;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;
use Laravel\Nova\Metrics\PartitionResult;

class AircraftUsageDistribution extends Partition
{
    /**
     * Calculate the value of the metric.
     */
    public $name = "Usage Distribution"; 

    public function calculate(NovaRequest $request): PartitionResult
    {
        $result = Aircraft::withCount('reservations')
            ->get()
            ->mapWithKeys(fn ($aircraft) => [$aircraft->registration => $aircraft->reservations_count])
            ->toArray();
        
        return $this->result($result);
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
        return 'aircraft-usage-distribution';
    }
}
