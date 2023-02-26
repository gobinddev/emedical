<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Appointment extends Model
{
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
