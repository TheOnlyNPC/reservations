<?php

namespace App\Nova\Dashboards;

use App\Models\Aircraft;
use App\Nova\Metrics\AircraftReservations;
use App\Nova\Metrics\AircraftTotal;
use App\Nova\Metrics\AircraftUsage;
use App\Nova\Metrics\AircraftUsageDistribution;
use Laravel\Nova\Dashboards\Main as Dashboard;
use Laravel\Nova\Cards\Help;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array<int, \Laravel\Nova\Card>
     */
    public function cards(): array
    {
        return [
            new AircraftTotal(),
            new AircraftUsageDistribution(),
            new AircraftReservations()->defaultRange(-7),
        ];
    }
}
