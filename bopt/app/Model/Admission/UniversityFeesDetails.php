<?php

namespace App\Model\Admission;

use Illuminate\Database\Eloquent\Model;

class UniversityFeesDetails extends Model
{
	protected $table="university_fees_details";
	protected $primaryKey="id";
	protected $fillable=['id', 'application_no', 'enrollment_no', 'fees_head_name', 'actual_amt', 'waiver_amt', 'pay_amt', 'due_amt', 'month', 'year', 'created_at', 'updated_at'];
}
