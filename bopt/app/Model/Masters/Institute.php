<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    //
	protected $table="institute";
	protected $primaryKey="id";
	protected $fillable=['id', 'institute_code', 'institute_name', 'institute_location', 'institute_address', 'institute_ph_no', 'institute_email', 'institute_status', 'logo_name', 'updated_at', 'created_at'];
}
