<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LtcApplyModel extends Model
{
    //
	protected $table = "ltc_apply";
	protected $primarykey = "id";
	protected $fillable = ['id', 'employee_code', 'emp_reporting_auth', 'emp_sanctioning_auth', 'apply_date', 'from_date', 'to_date', 'duration', 'purpose','ltc_status', 'updated_at', 'created_at'];
}
