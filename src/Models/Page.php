<?php

namespace Ninja\Manager\Models;

use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
  protected $dates = ['deleted_at'];
  protected $fillable = ['name', 'description', 'picture', 'slug', 'content', 'active'];
}
