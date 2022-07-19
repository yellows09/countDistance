<?php

namespace App\Http\Controllers;

use App\Contracts\CalculatingDistance;
use App\Http\Controllers\base\SimpleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Location\Coordinate;
use Location\Distance\Vincenty;

class PathController extends SimpleController
{
    public function index(float $d, float $s): int
    {
        return $this->service->calculateDistance($d,$s);
    }
}
