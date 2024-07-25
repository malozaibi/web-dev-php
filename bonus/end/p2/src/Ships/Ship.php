<?php

namespace App\Ships;

class Ship
{
    public $make;
    public $model;
    public $year;

    public function __construct($make, $model, $year)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }


    function getDetails()
    {
        return "This $this->make Car is model $this->model Built in Year $this->year";
    }
}
