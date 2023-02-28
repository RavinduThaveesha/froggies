<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Weather extends Model
{
    /**
     * attributes that aren't mass assignable.
     * 
     * @var array
     */
    protected $guarded = [];

    /**
     * Format the created date time.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y h:m:s a');
    }
}
