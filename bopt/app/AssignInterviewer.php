<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignInterviewer extends Model
{
    //
	protected $table = 'assign_interviewer';
	protected $primarykey = 'id';
	protected $fillable = ['id', 'company_id', 'department_id','job_apply_id', 'interviewer_name', 'job_title', 'applicant_name', 'date', 'updated_at', 'created_at'];
}
