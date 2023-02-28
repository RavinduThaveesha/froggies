<?php

namespace App\Repositories;

use App\Contracts\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * The model instance.
     * 
     */
    protected $model;

    /**
     * Create a new repository instance.
     * 
     * @param Model $model
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get model by id.
     * 
     * @param $id
     * @return Model
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new record in database.
     *
     * @return Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * delete record.
     * 
     * @param Int $id
     * @return Model
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}

