<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanApplyModel extends Model
{
    //
	protected $table = "loan_apply";
	protected $primarykey = "id";
	protected $fillable = ['id','employee_code', 'emp_reporting_auth', 'emp_sanctioning_auth', 'emp_lv_sanc_auth', 'loan_applied_no', 'loan_type', 'loan_amount', 'apply_date', 'loan_status', 'updated_at', 'created_at'];
}
