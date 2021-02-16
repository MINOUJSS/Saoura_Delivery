<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reating extends Model
{
    public function product()
    {
        return $this->belongsTo('App\product');
    }

    public function consumer()
    {
        return $this->belongsTo('App\consumer');
    }
}
