<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    protected $fillable = [
        'user_id','name'
    ];
    public function user()
    {
        return $this->belongsTo('App\Admin');
    }

    public function product_sizes()
    {
        return $this->hasMany('product_sizes');
    }
}
