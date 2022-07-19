<?php
namespace App\Contracts;
interface CalculatingDistance
{
    public function calculateDistance(float $latitude,float $longitude): int;
}
