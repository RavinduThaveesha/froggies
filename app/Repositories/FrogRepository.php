<?php

namespace App\Repositories;

use App\Frog;
use App\Contracts\FrogRepositoryInterface;
use Carbon\Carbon;

class FrogRepository extends BaseRepository implements FrogRepositoryInterface
{
    /**
     * Create a new model instance.
     *
     * @param Frog $model
     * @return void
     */
    public function __construct(Frog $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all instance.
     * To address n + 1 problem, introduce eager-loading and fetch frogs with types.
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->with('type')->get();
    }

    /**
     * Get all frogs that are not in mating.
     * 
     * @param Gender $gender, 1 = Male, 2 = Female
     * @return Collection
     */
    public function frogsNotInMating($gender) {
        return $this->model->with('type') 
            ->where('gender', $gender)
            ->where('dod', null)
            ->whereDoesntHave('mates', function ($query) {
                $query->where('status', 1)->where('end_date', null);
            })
            ->get();
    }

    /**
     * Update frog life status.
     * 
     * @param Int $id
     * @return App\Frog
     */
    public function status($id)
    {
        $model = $this->model->find($id);
        $model->dod = Carbon::now()->format('Y-m-d');

        return $model->save();
    }
}

