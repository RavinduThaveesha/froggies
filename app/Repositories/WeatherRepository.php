<?php

namespace App\Repositories;

use App\Weather;
use App\Contracts\WeatherRepositoryInterface;

class WeatherRepository extends BaseRepository implements WeatherRepositoryInterface
{
    /**
     * Create a new model instance.
     *
     * @param Weather $model
     * @return void
     */
    public function __construct(Weather $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all instance.
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get latest weather data.
     *
     * @return Collection
     */
    public function latest()
    {
        return $this->model->latest()->first();
    }
}

