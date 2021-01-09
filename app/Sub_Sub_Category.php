<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Sub_Category extends Model
{
    protected $fillable = [
        'sub_category_id','name', 'icon'
    ]; 

    public function sub_category()
    {
        return $this->belongsTo('App\Sub_Category');
    }
    
    public function products()
    {
        return $this->hasMany('App\product');
    }
}
