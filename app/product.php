<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'user_id','supplier_id','name','slug','brand_id','short_description','long_description','image','Purchasing_price','to_magazin_price','to_consumer_price','ombalage_price','adds_price','selling_price','qty','category_id','sub_category_id','sub_sub_category_id','statu'
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
    public function categories()
    {
        return $this->hasMany('App\Product_Category');
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

    public function videos()
    {
        return $this->hasMany('App\Product_videos');
    }
    
    public function colors()
    {
        return $this->hasMany('App\product_colors');
    }

    public function sizes()
    {
        return $this->hasMany('App\product_sizes');
    }
    // public function deals()
    // {
    //     return $this->hasMany('App\deal','product_id');
    // }

    public function copleted_sales()
    {
        return $this->haMany('App\Completed_Sale');
    }
    public function reatings()
    {
        return $this->hasMany('App\reating');
    }
    
    public function discount()
    {
        return $this->hasOne('App\discount');
    }

    public function seo()
    {
        return $this->hasOne('App\product_seo');
    }
    
}
