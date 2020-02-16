<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class SubjectConfig extends Model
{
    //
	protected $table='subject_configuration';
	protected $primarykey='id';
	//protected $timestapms='false';
	
	protected $fillable=['id', 'institute_code', 'faculty_id','rice_branch_code', 'course_code', 'subject_code','class_code','subject_name', 'status', 'updated_at', 'created_at'];
}
