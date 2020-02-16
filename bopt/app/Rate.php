<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    //
	protected $table='rate_master';
	protected $primaryKey='id';
	protected $fillable=['id', 'head_name'];
	
}
