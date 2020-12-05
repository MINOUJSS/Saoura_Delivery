<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    // protected $fillable = [
    //     'category_id','name', 'icon'
    // ];
    public function colors()
    {
        return $this->hasMany('App\color');
    }

    public function sizes()
    {
        return $this->hasMany('App\size');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    
    public function deals()
    {
        return $this->hasMany('App\deal');
    }

    public function order_products()
    {
        return $this->hasMany('App\order_product');
    }

    public function sub_categorys()
    {
        return $this->hasMany('App\Sub_Category');
    }

    public function sub_sub_categorys()
    {
        return $this->hasMany('App\Sub_Sub_Category');
    }

    public function suppliers()
    {
        return $this->belongsToMany('App\supplier');
    }
}
