<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mate extends Model
{
    /**
     * attributes that aren't mass assignable.
     * 
     * @var array
     */
    protected $guarded = [];

    /**
     * The frogs belongs to the mating.
     */
    public function frogs()
    {
        return $this->belongsToMany(Frog::class);
    }
}
