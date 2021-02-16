<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    public function completed_sales()
    {
        return $this->hasMany('App\Completed_Sale');
    }

    public function reatings()
    {
        return $this->hasMany('App\reating');
    }
}
