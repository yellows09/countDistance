<?php
namespace App\Http\Controllers\base;
class SimpleController extends \App\Http\Controllers\Controller
{
    public $service;
    public function __construct(\App\Services\CountDistance $countDistance)
    {
        $this->service = $countDistance;
    }
}
