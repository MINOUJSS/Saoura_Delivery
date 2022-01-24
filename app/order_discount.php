<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_discount extends Model
{
    protected $fillable = [
        'order_id','discount'
    ];

    public function order()
    {
        return $this->belongsTo('App\order');
    }
}
