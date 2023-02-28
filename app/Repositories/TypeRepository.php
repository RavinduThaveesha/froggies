<?php

namespace App\Repositories;

use App\Type;
use App\Contracts\TypeRepositoryInterface;

class TypeRepository extends BaseRepository implements TypeRepositoryInterface
{
    /**
     * Create a new model instance.
     *
     * @param Type $model
     * @return void
     */
    public function __construct(Type $model)
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
}

