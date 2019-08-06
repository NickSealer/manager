<?php

namespace Ninja\Manager\Models;

use Illuminate\Database\Eloquent\Model;
use Ninja\Manager\Article;

class Category extends Model
{
  protected $fillable = ['name', 'description', 'picture'];

  public function article(){
    return $this->hasOne('Ninja\Manager\Models\Article');
  }
}
