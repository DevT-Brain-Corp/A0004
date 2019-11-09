<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";

    public function profiles()
    {
        return $this->hasOne('App\Profiles');
    }

}
