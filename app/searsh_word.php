<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class searsh_word extends Model
{
    public function consumer()
    {
        return $this->belongsTo('App\Consumer');
    }
}
