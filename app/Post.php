<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'user_id', 'content', 'status'
  ];
  public function user() {
    return $this->belongsTo(user::class);
  }
}
