<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_sizes extends Model
{
    public function size()
    {
        return $this->belongsTo('App\size');
    }

    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
