<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
	protected $table="course";
	protected $primaryKey="id";
	protected $fillable=['id', 'course_code', 'institute_code', 'location_code', 'school_code', 'session', 'duration', 'semester', 'course_family', 'capacity', 'effective_start_date', 'effective_end_date', 'course_status', 'created_at', 'updated_at'];
}
