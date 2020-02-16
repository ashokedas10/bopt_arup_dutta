<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatePolicy extends Model
{
    //
	protected $table="late_policy";
	protected $primaryKey='id';
	protected $fillable=['id', 'company_id', 'grade_id', 'shift_id', 'max_grace_period', 'no_day_allow', 'no_day_salary_deducted', 'updated_at', 'created_at'];
	
}
