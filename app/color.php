<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    protected $fillable = [
        'name', 'code'
    ];
    public function product_colors()
    {
        return $this->hasMany('App\product_colors');
    }
    public function user()
    {
        return $this->belongsTo('App\Admin');
    }

}
