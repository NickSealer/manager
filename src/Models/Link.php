<?php

namespace Ninja\Manager\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['name', 'parent_id', 'section', 'position', 'description', 'link'];

    public function children() {
      return $this->hasMany('Ninja\Manager\Models\Link', 'parent_id');
    }

    public function parent() {
      return $this->belongsTo('Ninja\Manager\Models\Link', 'parent_id');
    }


}
