<?php

namespace App;

enum AircraftStatus: String
{
    case AVAILABLE = "Available";
    case MAINTENANCE = "Maintenance";
    case GROUNDED = "Grounded";
}
