<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    //
    
	protected $table='employee_type';
	protected $primaryKey='id';
	protected $fillable=['id', 'employee_type_name', 'created_at', 'updated_at', 'employee_type_status'];
}
