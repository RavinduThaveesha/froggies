<?php

namespace App\Contracts;

interface FrogRepositoryInterface
{
    public function all();

    public function frogsNotInMating($gender);

    public function status($id);
}

