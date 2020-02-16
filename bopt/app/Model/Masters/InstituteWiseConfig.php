<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class InstituteWiseConfig extends Model
{
    //
	protected $table='institute_wise_configuration';
	protected $primarykey='id';
	//protected $timestapms='false';
	
	protected $fillable=['id', 'institute_code', 'faculty_id','rice_branch_code', 'course_code','course_name','class_code', 'status', 'updated_at', 'created_at'];
}
