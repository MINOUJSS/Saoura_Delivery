<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function sub_sub_categories()
    {
        return $this->hasMany('App\Sub_Sub_Category');
    }
}
