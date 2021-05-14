<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_us extends Model
{
    public function reply()
    {
        return $this->hasOne('App\reply_contact');
    }
}
