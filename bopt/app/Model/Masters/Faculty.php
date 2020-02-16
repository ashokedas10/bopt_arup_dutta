<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    //
	protected $table="faculty";
	protected $primaryKey="id";
	protected $fillable=['id', 'institute_code', 'location_code','faculty_id', 'faculty_name', 'faculty_status', 'created_at', 'updated_at'];
}
