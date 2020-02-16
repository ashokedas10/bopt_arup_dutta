<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplyStatus extends Model
{
    //
	protected $table = 'job_apply_status';
	protected $primarykey = 'id';
	protected $fillable = ['id', 'job_apply_id', 'date', 'status', 'remarks', 'updated_at', 'created_at'];
}
