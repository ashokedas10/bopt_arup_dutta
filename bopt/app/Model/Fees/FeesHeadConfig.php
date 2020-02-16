<?php

namespace App\Model\Fees;

use Illuminate\Database\Eloquent\Model;

class FeesHeadConfig extends Model
{   
	protected $table="fees_head_config";
	protected $primaryKey="id";
	protected $fillable=['id', 'institute_code', 'class_code','branch_code', 'faculty_code', 'course_code', 'fees_head_code', 'fees_head_config_status', 'updated_at', 'created_at'];
}
