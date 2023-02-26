<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class CelebrityPick extends Model
{
    protected $table = 'celebrity_picks';

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
        'name', 'image', 'is_banner', 'created_at', 'updated_at', 'status', 'deleted_at',
    ];
}
