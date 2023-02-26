<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class ProductImage extends Model
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
		'product_id', 'name', 'is_thumbnail', 'description', 'created_at', 'updated_at', 'status', 'deleted_at',
    ];
}
