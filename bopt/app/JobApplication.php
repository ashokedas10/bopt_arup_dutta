<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{    
	protected $table = 'job_application';
	protected $primarykey = 'id';
	protected $fillable = ['id', 'company_id', 'department_id', 'apply_date', 'name', 'post', 'mobile', 'email', 'experience_year', 'experience_months', 'keyskill', 'highest_qualification', 'resume_name', 'address', 'updated_at', 'created_at'];
}
