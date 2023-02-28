<?php

namespace App\Contracts;

interface EloquentRepositoryInterface
{
    public function find($id);

    public function create(array $data);

    public function destroy($id);
}

