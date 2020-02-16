<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
	protected $table="subject";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'institute_code', 'location_code', 'school_code', 'subject_type', 'max_lab_marks', 'max_theory_marks', 'max_project_marks', 'max_credit', 'max_total', 'subject_code', 'subject_name', 'subject_status', 'created_at', 'updated_at'];
}
