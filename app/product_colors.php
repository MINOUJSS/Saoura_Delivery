<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_colors extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Admin');
    }
    public function product()
    {
        return $this->belongsTo('App\product');
    }

    public function color()
    {
        return $this->belongsTo('App\color');
    }
}
