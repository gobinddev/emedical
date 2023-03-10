<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Role extends Model
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
    protected $fillable = [
        'name', 'display_name', 'created_at', 'updated_at', 'status', 'deleted_at',
    ];
}
