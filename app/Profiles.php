<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $table = "profiles";

    function users() {
    return $this->belongsTo('App\Users');
  }
}
