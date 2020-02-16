<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadAttendenceModel extends Model
{    //
	protected $table = 'upload_attendence';
	protected $primarykey = 'id';
	protected $fillable = ['id', 'employee_code', 'month_yr', 'attendence_date', 'arrival_time', 'departure_time', 'attendence', 'duty_hrs' ,'trn_no', 'updated_at', 'created_at'];
}
