<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class ProductCategory extends Model
{
    protected $table = 'product_categories';

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
        'parent_id', 'name', 'description', 'remarks', 'image', 'created_at', 'updated_at', 'status', 'deleted_at',
    ];
}
