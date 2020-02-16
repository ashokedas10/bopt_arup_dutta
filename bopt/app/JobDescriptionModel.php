<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDescriptionModel extends Model
{
    //
	protected $table = "job_description";
	protected $primarykey = "id";
	protected $fillable = ['id', 'job_title', 'experience', 'key_skill', 'job_description', 'ctc', 'date', 'status', 'updated_at', 'created_at'];
}
