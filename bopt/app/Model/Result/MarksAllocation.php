<?php

namespace App\Model\Result;

use Illuminate\Database\Eloquent\Model;

class MarksAllocation extends Model
{
	protected $table="marks_allocation";
	protected $primaryKey="id";
	protected $fillable=['id', 'institute_code', 'faculty_code', 'course_code', 'semester_code', 'subject_code', 'tot_marks', 'pass_marks', 'exam_type_code', 'marks_allocation_status', 'updated_at', 'created_at'];
}
