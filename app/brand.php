<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class brand extends Model
{
    protected $fillable = [
        'name'
    ];  
    public function products()
    {
        return $this->hasMany('App\product');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Admin');
    }
}
