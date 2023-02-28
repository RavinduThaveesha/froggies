<?php

namespace App\Contracts;

interface MateRepositoryInterface
{
    public function all();

    public function status($id, array $data);
}

