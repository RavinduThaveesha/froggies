<?php

namespace App\Repositories;

use App\Mate;
use App\Contracts\MateRepositoryInterface;
use Carbon\Carbon;

class MateRepository extends BaseRepository implements MateRepositoryInterface
{
    /**
     * Create a new model instance.
     *
     * @param Mate $model
     * @return void
     */
    public function __construct(Mate $model)
    {
        parent::__construct($model);
    }
    
    /**
     * Get all instance.
     * 
     * To address n + 1 problem, introduce eager-loading and fetch mating details with frogs.
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->with('frogs')->get();
    }

    /**
     * Create a new record in database.
     * Attach forgs to mating record.
     * 
     * @param Array $data
     * @return App\Mate
     */
    public function create(array $data)
    {
        $this->model->start_date = Carbon::now()->format('Y-m-d');
        $this->model->save();
        
        $this->model->frogs()->attach([$data['male_id'], $data['female_id']]);

        return $this->model;
    }

    /**
     * Update mating status.
     * 
     * @param Int $id
     * @param Array $data
     * @return App\Mate
     */
    public function status($id, $data)
    {
        $model = $this->model->find($id);
        
        $model->status = $data['status'];
        $model->end_date = Carbon::now()->format('Y-m-d');

        return $model->save();
    }
}

