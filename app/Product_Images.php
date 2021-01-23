<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Images extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_id', 'image',
    ];

    public function product()
    {
        return $this->belongsTo('App\product');
    }

    public function user()
    {
        return $this->belongsTo('App\Admin');
    }
}
