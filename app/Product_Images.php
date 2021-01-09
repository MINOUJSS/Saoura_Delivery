<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Images extends Model
{
    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
