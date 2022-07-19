<?php
namespace App\Services;
use App\Contracts\CalculatingDistance;
use Location\Coordinate;
use Location\Distance\Vincenty;

class CountDistance implements CalculatingDistance
{
    public function calculateDistance(float $latitude, float $longitude) :int{
        $coordinate1 = new Coordinate($latitude, $longitude); // Your address
        $coordinate2 = new Coordinate(55.662882, 37.48561); // Haleakala Summit
        $calculator = new Vincenty();
        $res = $calculator->getDistance($coordinate1, $coordinate2);

        return (int)$res;
    }
}
