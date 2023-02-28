<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * Get the frogs for the type.
     */
    public function frogs()
    {
        return $this->hasMany(Frogs::class);
    }
}
