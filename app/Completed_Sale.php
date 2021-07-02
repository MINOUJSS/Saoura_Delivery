<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Completed_Sale extends Model
{
    protected $fillable = [
        'consumer_id','product_id','qty'
    ]; 

    public function product()
    {
        return $this->belongsTo('App\product');
    }

    public function consumer()
    {
        return $this->belongsTo('App\Consumer');
    }
}
