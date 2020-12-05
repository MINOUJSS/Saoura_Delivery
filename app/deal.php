<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deal extends Model
{
    protected $fillable = [
        'user_id', 'product_id','title','daitels','descount','link'
    ];

    public function user()
    {
        return $this->belongsTo('App\Admin');
    }

    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
