<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePayStructure extends Model
{
	protected $table="employee_pay_structure";
	protected $primaryKey="id";
	protected $fillable=['id', 'employee_code', 'basic_pay', 'head_name', 'head_name_val', 'head_type', 'created_at', 'updated_at'];
}
