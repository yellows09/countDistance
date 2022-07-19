<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Location\Coordinate;
use Location\Distance\Vincenty;
class PathController extends Controller
{
    public function index($d,$s){
        $coordinate1 = new Coordinate($d, $s); // Your address
        $coordinate2 = new Coordinate(55.662882, 37.48561); // Haleakala Summit
        $calculator = new Vincenty();
        $res = $calculator->getDistance($coordinate1, $coordinate2);

        return (int)$res;
    }
}
