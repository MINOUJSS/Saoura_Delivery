<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Consumer extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $guard='consumer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname','email','email_verified_at','password'
    ];

    public function completed_sales()
    {
        return $this->hasMany('App\Completed_Sale');
    }

    public function reatings()
    {
        return $this->hasMany('App\reating');
    }
}
