<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    //
	protected $table='designation';
	protected $primaryKey='id';
	protected $fillable=['id', 'department_code','designation_code', 'designation_name', 'created_at', 'updated_at', 'designation_status'];
	
}
