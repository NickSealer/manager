<?php

namespace Ninja\Manager\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
  public function article(){
      return $this->belongsTo('Ninja\Manager\Models\Article');
  }
}
