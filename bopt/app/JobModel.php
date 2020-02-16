<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobModel extends Model
{
    //
	protected $table = "job";
	protected $primarykey = "id";
	protected $fillable = ['id', 'job_title', 'job_status', 'updated_at', 'created_at'];
}
