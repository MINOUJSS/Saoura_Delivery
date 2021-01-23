<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'user_id','supplier_id','name','brand_id','short_description','long_description','image','Purchasing_price','to_magazin_price','to_consumer_price','ombalage_price','adds_price','selling_price','qty','category_id','sub_category_id','sub_sub_category_id'
    ];
    public function sales()
    {
        return $this->hasMany('App\Completed_Sale');
    }
    public function brand()
    {
        return $this->belongsTo('App\brand');
    }
    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Sub_Category');
    }

    public function sub_sub_category()
    {
        return $this->belongsTo('App\Sub_Sub_Category');
    }

    public function supplier()
    {
        return $this->belongsTo('App\supplier');
    }

    public function user()
    {
        return $this->belongsTo('App\Admin');
    }

    public function images()
    {
        return $this->hasMany('App\Product_Images');
    }
    
    public function colors()
    {
        return $this->hasMany('App\product');
    }
    public function copleted_sales()
    {
        return $this->haMany('App\Completed_Sale');
    }
    // public function colors()
    // {
    //     return $this->hasMany('App\color');
    // }

    // public function sizes()
    // {
    //     return $this->hasMany('App\size');
    // }
    
    // public function categories()
    // {
    //     return $this->belongsToMany('App\Category');
    // }
    
    // public function deals()
    // {
    //     return $this->hasMany('App\deal');
    // }

    // public function order_products()
    // {
    //     return $this->hasMany('App\order_product');
    // }

    // public function sub_categorys()
    // {
    //     return $this->hasMany('App\Sub_Category');
    // }

    // public function sub_sub_categorys()
    // {
    //     return $this->hasMany('App\Sub_Sub_Category');
    // }

    // public function suppliers()
    // {
    //     return $this->belongsToMany('App\supplier');
    // }
}
