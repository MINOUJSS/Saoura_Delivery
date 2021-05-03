<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_id', 'billing_name','billing_email','billing_address','billing_mobile','status'
    ];

    public function consumer()
    {
        return $this->belongsTo('App\Consumer');
    }
    
    public function order_products()
    {
        return $this->hasMany('App\order_product');
    }
    
}
