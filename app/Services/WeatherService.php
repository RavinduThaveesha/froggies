<?php

namespace App\Services;

use App\Contracts\WeatherRepositoryInterface;
use Yajra\DataTables\DataTables;

class WeatherService {

    /**
     * The repository instance.
     * 
     */
    protected $repository;

     /**
     * Create a new service instance.
     * 
     * @param FrogRepository $repository
     * @return void
     */
    public function __construct(WeatherRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create new weather record.
     *
     * @param  Array $data
     * @return Model
     */
    public function store($data)
    {
        return $this->repository->create($data);
    }

    /**
     * Generate datatable
     *
     * @return Datatable
     */
    public function makeDatatable()
    {
        $data = $this->repository->all();
        return Datatables::of($data)
            ->addColumn('date_time', function($row) {
                return $row->created_at;
            })
            ->make(true);
    }

    /**
     * Get latest weather data.
     *
     * @return Collection
     */
    public function latest()
    {
        return $this->repository->latest();
    }
}