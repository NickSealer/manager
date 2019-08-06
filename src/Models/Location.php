<?php

namespace Ninja\Manager\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  protected $fillable = [
      'name', 'latitude', 'longitude', 'address', 'phone', 'location_type'
  ];
  protected $dates = ['deleted_at', 'event_start', 'event_end'];
}
