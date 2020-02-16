<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
	protected $table='branch';
	protected $primaryKey='id';
	protected $fillable=['id', 'branch_name', 'branch_code', 'phone', 'address', 'location', 'created_at', 'updated_at', 'branch_status'];
	 
}
