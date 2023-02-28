<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Frog extends Model
{
    use SoftDeletes;

    /**
     * attributes that aren't mass assignable.
     * 
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the type that owns the frog.
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * The mating belongs to the the frog.
     */
    public function mates()
    {
        return $this->belongsToMany(Mate::class);
    }

    /**
     * Format the frog's date of birth.
     *
     * @param  string  $value
     * @return string
     */
    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Format the frog's date of death.
     *
     * @param  string  $value
     * @return string
     */
    public function getDodAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d/m/Y') : '';
    }

    /**
     * Get the frog's gender.
     *
     * @param  string  $value
     * @return string
     */
    public function getGenderAttribute($value)
    {
        return $value == 1 ? 'Male' : 'Female';
    }

    /**
     * Set frog's date of birth .
     *
     * @param  string  $value
     * @return void
     */
    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = (new Carbon($value))->format('Y-m-d');
    }
}
