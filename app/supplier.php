<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $fillable = [
        'name', 'email','address','mobile'
    ];

    public function products()
    {
        return $this->belongsToMany('App\product');
    }
}
