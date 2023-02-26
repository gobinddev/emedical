<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class SliderImage extends Model
{
    protected $table = 'slider_images';

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'image', 'show_in_slider', 'created_at', 'updated_at', 'status', 'deleted_at',
    // ];
    protected $guarded = [];
}
