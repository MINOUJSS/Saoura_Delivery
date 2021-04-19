<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    protected $fillable = [
        'order_id', 'product_id','qty'
    ];
    public function order()
    {
        return $this->belongsTo('App\order');
    }

    public function product()
    {
        return $this->belongsTo('App\product');
    }
    
    public function color()
    {
        return $this->belongsTo('App\color');
    }

    public function size()
    {
        return $this->belongsTo('App\size');
    }

}
