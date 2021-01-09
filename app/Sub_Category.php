<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $fillable = [
        'category_id','name', 'icon'
    ];

    public function Category()
    {
        return $this->belongsTo('App\category');
    }

    public function sub_sub_categories()
    {
        return $this->hasMany('App\Sub_Sub_Category');
    }

    public function products()
    {
        return $this->hasMany('App\product');
    }
}
