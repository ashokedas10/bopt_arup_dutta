<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftModel extends Model
{
    //
	protected $table='shift_management';
	protected $primarykey='shift_id';
	//protected $timestapms='false';
	
	protected $fillable=['shift_id', 'company_id', 'grade_id', 'shift_name', 'shift_description', 'shift_in_time', 'shift_out_time', 'recess_from_time', 'recess_to_time', 'created_at', 'updated_at'];
}
