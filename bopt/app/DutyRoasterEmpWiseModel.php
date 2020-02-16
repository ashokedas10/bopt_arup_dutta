<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DutyRoasterEmpWiseModel extends Model
{
    //
	protected $table = 'duty_roaster_empwise';
	protected $primarykey = 'id';
	protected $fillable = [ 'id', 'company_id', 'grade_id', 'employee_code', 'employee_name', 'shift_id', 'updated_at', 'created_at'];
}
