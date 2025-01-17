<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourApplyModel extends Model
{
    //
	protected $table = "tour_apply";
	protected $primarykey = "id";
	protected $fillable = ['id', 'employee_code', 'emp_reporting_auth', 'emp_sanctioning_auth', 'emp_lv_sanc_auth', 'apply_date', 'from_date', 'to_date', 'duration', 'purpose','tour_status', 'advance_release', 'updated_at', 'created_at'];
}
