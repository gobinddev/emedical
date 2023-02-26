<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Product extends Model
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
        'product_category_id', 'product_code', 'name', 'is_popular', 'colour', 'height', 'width', 'gross_weight', 'description', 'remarks', 'image', 'video', 'created_at', 'updated_at', 'status', 'deleted_at',
    ];
}
