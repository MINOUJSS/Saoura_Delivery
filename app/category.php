<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
   protected $fillable = [
      'name', 'image', 'icon'
  ]; 

     public function Sub_Categories()
     {   
        return $this->hasMany('App\Sub_Category');
     }

     public function products()
     {
        return $this->hasMany('App\product');
     }
     
}
