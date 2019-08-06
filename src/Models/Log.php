<?php

namespace Ninja\Manager\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
  public function user() {
    return $this->belongsTo('Ninja\Manager\Models\User');
  }
}
