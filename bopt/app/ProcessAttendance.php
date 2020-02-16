<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessAttendance extends Model
{
   
	protected $table='process_attendance';
	protected $primaryKey='id';
	protected $fillable=['id','employee_code', 'month_yr', 'no_of_working_days', 'no_of_days_absent', 'no_of_days_leave_taken', 'no_of_present', 'updated_at', 'created_at'];
}
