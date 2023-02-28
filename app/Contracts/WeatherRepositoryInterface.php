<?php

namespace App\Contracts;

interface WeatherRepositoryInterface
{
    public function all();

    public function latest();
}

