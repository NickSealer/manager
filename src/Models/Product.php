<?php

namespace Ninja\Manager\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name', 'pdf_link', 'description', 'picture', 'product_type', 'slug'
    ];

    protected $dates = ['deleted_at', 'event_start', 'event_end'];

    public function user() {
        return $this->belongsTo('Ninja\Manager\Models\User');
    }
}
