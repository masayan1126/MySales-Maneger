<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $primaryKey = 'product_id';
    protected $casts = [
        'product_id' => 'integer',
      ];
}
