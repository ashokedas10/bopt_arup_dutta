<?php

namespace App\Model\Fees;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{   
	protected $table="fees";
	protected $primaryKey="id";
	protected $fillable=['id', 'institute_code', 'class_code', 'faculty_code', 'course_code', 'fees_head_code', 'session', 'mode_of_payment', 'no_of_installement', 'category', 'national_type', 'frm_dt', 'to_dt', 'ammount', 'updated_at', 'created_at', 'fees_status' ];
}
