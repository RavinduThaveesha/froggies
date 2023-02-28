<?php

namespace App\Services;

use App\Contracts\TypeRepositoryInterface;

class TypeService {

    /**
     * The repository instance.
     * 
     */
    protected $repository;

     /**
     * Create a new service instance.
     * 
     * @param TypeRepository $repository
     * @return void
     */
    public function __construct(TypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all instance.
     *
     * @return Collection
     */
    public function all()
    {
        return $this->repository->all();
    }
}