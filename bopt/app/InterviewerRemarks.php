<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewerRemarks extends Model
{
    //
	protected $table = 'interviewer_remarks';
	protected $primarykey = 'id';
	protected $fillable = ['id', 'job_apply_id', 'date', 'status', 'remarks', 'updated_at', 'created_at'];
}
