<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Products extends Model
{

	  use Softdeletes;
	 
     //use Softdeletes;
     protected $table='products';
     protected $dates=['deleted_at'];
     protected $fillable = [
        'name', 'price','brand','picture',
    ];

}
