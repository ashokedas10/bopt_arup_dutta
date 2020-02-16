<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OffdayModel extends Model
{
    //
	protected $table='offday';
	protected $primarykey='id';
	//protected $timestapms='false';
	
	protected $fillable=['id', 'employee_code', 'employee_name', 'company_id', 'grade_id', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'created_at', 'updated_at'];
}
