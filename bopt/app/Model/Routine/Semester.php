<?php

namespace App\Model\Routine;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
	protected $table="semester";
	protected $primaryKey="id";
	protected $fillable=['id', 'semester_code', 'semester_name', 'semester_status', 'updated_at', 'created_at'];
}
