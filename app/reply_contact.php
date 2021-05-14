<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reply_contact extends Model
{
    public function contact()
    {
        return $this->belongsTo('App\contact_us');
    }
}
