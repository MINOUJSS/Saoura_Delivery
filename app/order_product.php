<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    protected $fillable = [
        'order_id', 'product_id','qty'
    ];
    public function orders()
    {
        return $this->hasMany('App\order');
    }

    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
