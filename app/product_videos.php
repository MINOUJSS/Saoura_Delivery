<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_videos extends Model
{
    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
