<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeGradeWiseAllowance extends Model
{
    //
	protected $table='emp_grade_wise_allowance';
	protected $primaryKey='id';
	protected $fillable=[  'id', 'company_id', 'grade_id', 'head_id', 'head_name', 'in_per', 'in_rs', 'min_basic', 'max_basic', 'emp_grade_wise_status', 'head_type', 'created_at', 'updated_at'];
}
