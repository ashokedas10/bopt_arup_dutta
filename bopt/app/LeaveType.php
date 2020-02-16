<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    //
	protected $table='leave_type';
	protected $primarykey='id';
	//protected $timestapms='false';
	
	protected $fillable=['id','leave_type_name', 'alies', 'remarks','created_at', 'updated_at','leave_type_status'];
	
}
