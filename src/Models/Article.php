<?php

namespace Ninja\Manager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
  protected $fillable = ['name', 'category_id', 'date', 'description', 'picture'];
  protected $dates = ['deleted_at', 'event_start', 'event_end'];

  public function category(){
    return $this->belongsTo('Ninja\Manager\Models\Category');
  }

  public function sliders(){
    return $this->hasMany('Ninja\Manager\Models\Slider')->orderBy('position', 'asc');
  }
}
